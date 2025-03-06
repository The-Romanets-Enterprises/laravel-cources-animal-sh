<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\EmployeeController;
use App\Http\Controllers\Dashboard\OwnerController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\VerificationController;

use App\Http\Controllers\Mainwebsite\HomeController;

use App\Http\Middleware\CheckUserRole;
use App\Http\Middleware\GuestMiddleware;

use Illuminate\Support\Facades\Route;

use App\Enums\Role;


// --- Подтверждение Email (активация после регистрации) ---
Route::middleware('auth')->controller(VerificationController::class)->group(function () {
    Route::get('/verify-email', 'show')->name('verification.notice');
    Route::get('/verify-email/{id}/{hash}', 'verify')->middleware('signed')->name('verification.verify');
    Route::post('/verify-email/resend', 'resend')->middleware('throttle:6,1')->name('verification.send');
});


// --- 1. Аутентификация (auth/) ---
Route::prefix('/auth')->name('auth.')->group(function () {

    // --- Перенаправление с /auth на /auth/login ---
    Route::get('/', function () {
        return redirect()->route('auth.login');
    })->name('index');

    // --- Авторизация / Регистрация ---
    Route::middleware(GuestMiddleware::class)->controller(AuthController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'auth')->name('auth');
        Route::get('/register', 'RegisterForm')->name('register');
        Route::post('/register', 'register')->name('register.post');
    });

    // --- Выход из системы ---
    Route::middleware('auth')->controller(AuthController::class)->group(function () {
        Route::post('/logout', 'logout')->name('logout');
    });
});


// --- 2. Основной сайт (/) ---
Route::prefix('/')->name('mainwebsite.')->group(function () {

    // --- Страницы основого сайта ---
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/about-us', 'about_us')->name('about-us');
        Route::get('/our-specialists', 'our_specialists')->name('our-specialists');
        Route::get('/our-company', 'our_company')->name('our-company');
        Route::get('/reviews', 'reviews')->name('reviews');
        Route::get('/contacts', 'contacts')->name('contacts');
        Route::get('/terms', 'terms')->name('terms');
        Route::get('/privacy-policy', 'privacy_policy')->name('privacy-policy');
    });
});


// --- 3. Дэшборд (panel/) ---
Route::prefix('panel')->name('dashboard.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', function () {
        $user = auth()->user();

        return match ($user->role) {
            Role::OWNER => redirect()->route('dashboard.owner.home'),
            Role::ADMIN => redirect()->route('dashboard.admin.home'),
            Role::EMPLOYEE => redirect()->route('dashboard.employee.home'),
            Role::USER => redirect()->route('dashboard.user.home'),
        };
    })->name('index');

    Route::middleware(CheckUserRole::class)->group(function () {

        // --- Владелец ---
        Route::controller(OwnerController::class)->group(function () {
            Route::get('/owner/home', 'home')->name('owner.home');
        });

        // --- Администратор ---
        Route::controller(AdminController::class)->group(function () {
            Route::get('/admin/home', 'home')->name('admin.home');
        });

        // --- Сотрудник ---
        Route::controller(EmployeeController::class)->group(function () {
            Route::get('/employee/home', 'home')->name('employee.home');
        });

        // --- Обычный пользователь ---
        Route::controller(UserController::class)->group(function () {
            Route::get('/user/home', 'home')->name('user.home');
            Route::get('/user/applications', 'applications')->name('user.applications');
        });
    });

    // Профиль пользователя (доступен всем авторизованным)
    Route::controller(UserController::class)->group(function () {
        Route::get('/user/id{id}', 'profile')->name('user.profile');
    });
});
