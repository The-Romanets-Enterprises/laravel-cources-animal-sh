<?php

namespace App\Http\Controllers\Dashboard;

use App\Mail\ActivationMail;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Enums\Role;

// Контроллер для аутентификации
class AuthController extends Controller
{
    public function test()
    {
        return view('layouts.test');
    }

    // Страница входа (GET /sign in)
    public function sign_in()
    {
        $title = __('auth.titles.sign-in');
        return view('auth.sign-in', compact('title'));
    }

    // Страница регистрации (GET /sign up)
    // Показываем страницу регистрации (GET /sign-up)
    public function showSignUpForm()
    {
        $title = 'Регистрация';
        return view('auth.sign-up', compact('title'));
    }

    // Обрабатываем регистрацию (POST /sign-up)
    public function sign_up(RegisterRequest $request)
    {
        // Валидируем данные
        $data = $request->validated();

        // Хешируем пароль
        $data['password'] = Hash::make($data['password']);

        // Генерируем токен активации
        $data['activation_token'] = Str::uuid();
        $data['activation_expires_at'] = now()->addDay(); // 24 часа на активацию

        // Создаём пользователя в БД (ещё неактивного)
        $user = User::create($data);

        // Формируем ссылку активации
        $activationUrl = route('auth.activate', ['token' => $user->activation_token]);

        // Отправляем письмо активации
        Mail::to($user->email)->send(new ActivationMail($activationUrl));

        // Перенаправляем на страницу уведомления
        return view('auth.pending-activation', ['email' => $user->email]);
    }

    public function activateAccount(Request $request)
    {
        // Получаем токен из запроса
        $token = $request->query('token');

        // Ищем пользователя с этим токеном
        $user = User::where('activation_token', $token)->first();

        // Если пользователь не найден или токен истёк → ошибка
        if (!$user || now()->setTimezone('Europe/Moscow')->greaterThan($user->activation_expires_at)) {
            return view('auth.activation-failed');
        }

        // Проверяем, активирован ли уже аккаунт
        if ($user->email_verified_at) {
            return view('auth.activation-already');
        }

        // Активируем аккаунт
        $user->update([
            'activation_token' => null, // Удаляем токен
            'activation_expires_at' => null, // Удаляем срок активации
            'email_verified_at' => now(), // Активируем аккаунт
        ]);

        // Перенаправляем на страницу с уведомлением об успешной активации
        return view('auth.activation-success');
    }

    // Обработка входа (POST /login)
    public function auth(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        // Пытаемся аутентифицировать пользователя
        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate(); // Обновляем сессию после входа
            $user = Auth::user();

            // Проверка активации аккаунта
            if ($user->activation_token) {
                Auth::logout();
                return back()->withErrors(['email' => 'Ваш аккаунт не активирован. Пожалуйста, проверьте вашу почту для активации.']);
            }

            // Редирект в зависимости от роли
            return match ($user->role) {
                Role::ADMIN => to_route('dashboard.admin.home'),
                Role::EMPLOYEE => to_route('dashboard.employee.home'),
                Role::USER => to_route('dashboard.user.home'),
                default => to_route('dashboard.index'),
            };
        }

        return back()->withErrors(['email' => __('messages.auth.failed')])->onlyInput('email');
    }

    // Выход из аккаунта (POST /sign-out)
    public function sign_out(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return view('auth.sign-out');
    }
}
