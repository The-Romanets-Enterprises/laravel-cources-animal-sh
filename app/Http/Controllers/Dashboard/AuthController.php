<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showSignUpForm()
    {
        return view('auth.sign-up', ['title' => 'Регистрация']);
    }

    public function sign_up(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        // Создаём пользователя
        $user = User::create($data);

        // Отправляем письмо для верификации email
        $user->sendEmailVerificationNotification();

        // Перенаправляем на страницу подтверждения email
        return redirect()->route('auth.verification.notice');
    }

    public function sign_in()
    {
        return view('auth.sign-in', ['title' => 'Авторизация']);
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
                Role::ADMIN => to_route('dashboard.admin.home'),
                Role::EMPLOYEE => to_route('dashboard.employee.home'),
                Role::USER => to_route('dashboard.user.home'),
                default => to_route('dashboard.index'),
            };
        }

        return back()->withErrors(['email' => __('messages.auth.failed')])->onlyInput('email');
    }

    public function sign_out(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return view('auth.sign-out');
    }
}
