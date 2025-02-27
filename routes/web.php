<?php

use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\EmployeeController;
use App\Http\Controllers\Mainwebsite\HomeController;
use Illuminate\Support\Facades\Route;
use App\Enums\Role;

Route::get('/test', [AuthController::class, 'test'])->name('test');

// --- Перенаправление (auth/) в зависимости от роли ---
Route::get('/auth', function () {
    if (Auth::check()) {
        return match (Auth::user()->role) {
            Role::ADMIN => redirect()->route('dashboard.admin.home'),
            Role::EMPLOYEE => redirect()->route('dashboard.employee.home'),
            Role::USER => redirect()->route('dashboard.user.home'),
            default => redirect()->route('dashboard.index'),
        };
    }

    return redirect()->route('auth.sign-in'); // Если не авторизован
})->name('auth.redirect');


// --- 1. Авторизация (auth/) ---
Route::prefix('auth')->name('auth.')->middleware(\App\Http\Middleware\GuestMiddleware::class)->group(function () {
    Route::get('/sign-up', [AuthController::class, 'showSignUpForm'])->name('show-sign-up');
    Route::post('/sign-up', [AuthController::class, 'sign_up'])->name('sign-up');
    Route::get('/sign-in', [AuthController::class, 'sign_in'])->name('sign-in');
    Route::post('/sign-in', [AuthController::class, 'auth'])->name('auth');

    Route::get('/activate/{token}', [AuthController::class, 'activateAccount'])->name('activate');

});

Route::middleware('auth')->group(function () {
    Route::post('/sign-out', [AuthController::class, 'sign_out'])->name('sign-out');
});


// --- 2. Основной сайт (/) ---
Route::prefix('/')->name('mainwebsite.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/our-specialists', [HomeController::class, 'ourspecialists'])->name('our-specialists');
    Route::get('/contacts', [HomeController::class, 'contacts'])->name('contacts');
    Route::get('/terms', [HomeController::class, 'terms'])->name('terms');
    Route::get('/privacy-policy', [HomeController::class, 'privacy_policy'])->name('privacy-policy');
});


// --- 3. Дэшборд (panel/) ---
Route::prefix('panel')->name('dashboard.')->middleware(\App\Http\Middleware\RedirectIfNotAuthenticated::class)->group(function () {
    Route::get('/', function () {
        if (Auth::check()) {
            return match (Auth::user()->role) {
                Role::ADMIN => redirect()->route('dashboard.admin.home'),
                Role::EMPLOYEE => redirect()->route('dashboard.employee.home'),
                Role::USER => redirect()->route('dashboard.user.home'),
                default => redirect()->route('dashboard.index'),
            };
        }
        return redirect()->route('auth.sign_in'); // Если неавторизован
    })->name('index');

    Route::get('/admin', function () {
        return redirect()->route('dashboard.admin.home');
    });

    Route::get('/employee', function () {
        return redirect()->route('dashboard.employee.home');
    });

    Route::middleware(\App\Http\Middleware\CheckUserRole::class)->group(function () {
        Route::get('/index', [UserController::class, 'home'])->name('user.home'); // Обычный пользователь
        Route::get('/employee/home', [EmployeeController::class, 'home'])->name('employee.home'); // Сотрудник
        Route::get('/admin/home', [AdminController::class, 'home'])->name('admin.home'); // Администратор
    });
});
