<?php

use App\Http\Controllers\Dashboard\AuthController;
use Illuminate\Support\Facades\Route;

// 🌟 Главный сайт
Route::get('/', function () {
    return view('mainwebsite.main');
})->name('main');

// 🔹 Выход (Logout) через GET
Route::middleware('auth')->get('/logout', [AuthController::class, 'logout'])->name('auth.logout'); // Выход работает здесь

// 🔹 Переадресация /auth → /auth/login (НО! Если пользователь авторизован → panel)
Route::get('/auth', function () {
    return auth()->check() ? redirect()->route('dashboard.home') : redirect()->route('auth.login');
})->name('auth.redirect');

// 🔹 Аутентификация (только для НЕавторизованных пользователей)
Route::prefix('auth')->name('auth.')->group(function () {
    Route::middleware('guest')->controller(AuthController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'auth')->name('login.auth');
        Route::get('/logout', function () {
            return view('auth.logout');
        })->name('auth.logout'); // Страница после выхода

        Route::get('/register', function () {
            return view('auth.register');
        })->name('register');

        Route::get('/confirm-mail', function () {
            return view('auth.confirm-mail');
        })->name('confirm-mail');

        Route::get('/forgot-password', function () {
            return view('auth.forgot-password');
        })->name('forgot-password');

        Route::get('/google-authenticator-lock', function () {
            return view('auth.google-authenticator-lock');
        })->name('google-authenticator-lock');

        Route::get('/reset-password', function () {
            return view('auth.reset-password');
        })->name('reset-password');
    });

    // 🔹 Если авторизованный пользователь заходит в auth/, его переадресует в panel/
    Route::middleware('auth')->group(function () {
        Route::get('{any}', function () {
            return redirect()->route('dashboard.home');
        })->where('any', '.*');
    });
});

// 🌟 Панель управления (dashboard, только для авторизованных пользователей)
Route::prefix('panel')->name('dashboard.')->middleware('auth')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/', 'index')->name('home'); // Главная страница dashboard
    });

    // 🛑 Страница 404 для panel/
    Route::get('/404', function () {
        return view('dashboard.404');
    })->name('404');

    // 🔹 Перенаправление всех несуществующих ссылок в panel/ на panel/404
    Route::fallback(function () {
        return redirect()->route('dashboard.404');
    });
});
