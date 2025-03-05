<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\Role;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function RegisterForm()
    {
        $title = __('auth.titles.register');
        return view('auth.register', compact('title'));
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        // Создаём пользователя
        $user = User::create($data);

        // Отправляем письмо для верификации email
        $user->sendEmailVerificationNotification();

        Auth::login($user);

        // Перенаправляем с передачей email
        return to_route('verification.notice')->with('email', $user->email);
    }

    public function login()
    {
        return view('auth.login', ['title' => 'Авторизация']);
    }

    public function auth(LoginRequest $request)
    {
        if (Auth::attempt($request->only('email', 'password'), $request->remember)) {
            $user = Auth::user();

            // Если email не подтверждён, выкидываем пользователя
            if (!$user->hasVerifiedEmail()) {
                Auth::logout();
                return back()->withErrors(['email' => 'Пожалуйста, подтвердите ваш email.']);
            }

            return match ($user->role) {
                Role::OWNER => to_route('dashboard.owner.home'),
                Role::ADMIN => to_route('dashboard.admin.home'),
                Role::EMPLOYEE => to_route('dashboard.employee.home'),
                Role::USER => to_route('dashboard.user.home'),
                default => to_route('dashboard.index'),
            };
        }

        return back()->withErrors(['email' => __('messages.auth.failed')])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return view('auth.logout');
    }
}
