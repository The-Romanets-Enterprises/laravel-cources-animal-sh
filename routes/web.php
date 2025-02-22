<?php

use App\Http\Controllers\Dashboard\AuthController;
use Illuminate\Support\Facades\Route;
use App\Enums\Role;

// 🌟 Главный сайт
Route::get('/', function () {
    return view('mainwebsite.main');
})->name('main');

// 🔹 Переадресация /auth → /panel/{role}/home (если авторизован)
Route::get('/auth', function () {
    if (!auth()->check()) {
        return redirect()->route('auth.login');
    }

    return match (auth()->user()->role) {
        'admin' => redirect()->route('dashboard.admin.home'),
        'employee' => redirect()->route('dashboard.employee.home'),
        default => redirect()->route('dashboard.user.home'),
    };
})->name('auth.redirect');

// 🔹 Аутентификация (только для НЕавторизованных пользователей)
Route::prefix('auth')->name('auth.')->middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'auth')->name('login.auth');

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

    Route::get('/404', function () {
        return view('auth.404');
    })->name('404');

    // 🔹 Перенаправление всех несуществующих страниц auth/ → auth/404
    Route::fallback(function () {
        return redirect()->route('auth.404');
    });
});

// 🔹 Если авторизованный пользователь заходит в /auth/что-то → редирект в panel/{role}/home
Route::middleware('auth')->prefix('auth')->group(function () {
    Route::get('{any}', function () {
        return match (auth()->user()->role) {
            'admin' => redirect()->route('dashboard.admin.home'),
            'employee' => redirect()->route('dashboard.employee.home'),
            default => redirect()->route('dashboard.user.home'),
        };
    })->where('any', '.*');
});

// 🌟 Панель управления (dashboard, только для авторизованных пользователей)
Route::prefix('panel')->name('dashboard.')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return match (auth()->user()->role) {
            'admin' => redirect()->route('dashboard.admin.home'),
            'employee' => redirect()->route('dashboard.employee.home'),
            default => redirect()->route('dashboard.user.home'),
        };
    })->name('home');

    // 🔹 Администратор (видит всё)
    Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function () {
        Route::get('/home', function () {
            return view('dashboard.admin.home');
        })->name('home');

        // 🛑 404 для admin/
        Route::fallback(function () {
            return redirect()->route('dashboard.404');
        });
    });

    // 🔹 Работник (видит employee + user)
    Route::prefix('employee')->name('employee.')->middleware('role:employee')->group(function () {
        Route::get('/home', function () {
            return view('dashboard.employee.home');
        })->name('home');

        // 🛑 Доступ к admin запрещён → 404
        Route::get('/admin/{any}', function () {
            return redirect()->route('dashboard.404');
        })->where('any', '.*');

        // 🛑 404 для employee/
        Route::fallback(function () {
            return redirect()->route('dashboard.404');
        });
    });

    // 🔹 Обычный пользователь (видит только user)
    Route::prefix('user')->name('user.')->middleware('role:user')->group(function () {
        Route::get('/home', function () {
            return view('dashboard.user.home');
        })->name('home');

        // 🛑 404 для user/
        Route::fallback(function () {
            return redirect()->route('dashboard.404');
        });
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
