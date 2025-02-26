<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Enums\Role;

// Контроллер для аутентификации
class AuthController extends Controller
{
    // Страница входа (GET /sign in)
    public function sign_in()
    {
        $title = __('auth.titles.sign-in');
        return view('auth.sign-in', compact('title'));
    }

    // Страница регистрации (GET /sign up)
    public function sign_up()
    {
        $title = __('auth.titles.sign-up');
        return view('auth.sign-up', compact('title'));
    }

    // Обработка входа (POST /login)
    public function auth(LoginRequest $request)
    {
        if (Auth::attempt($request->only('email', 'password'), $request->remember)) {
            $request->session()->regenerate(); // Обновляем сессию после входа
            $user = Auth::user();

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
