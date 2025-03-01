<?php

use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\VerificationController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\EmployeeController;
use App\Http\Controllers\Mainwebsite\HomeController;
use Illuminate\Support\Facades\Route;
use App\Enums\Role;

// --- 1. Авторизация (auth/) ---
Route::middleware(\App\Http\Middleware\GuestMiddleware::class)->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'auth'])->name('auth');
    Route::get('/register', [AuthController::class, 'RegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

// --- Выход из системы ---
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// --- Подтверждение Email ---
Route::middleware('auth')->group(function () {
    Route::get('/verify-email', [VerificationController::class, 'show'])->name('verification.notice');
    Route::get('/verify-email/{id}/{hash}', [VerificationController::class, 'verify'])->middleware('signed')->name('verification.verify');
    Route::post('/verify-email/resend', [VerificationController::class, 'resend'])->middleware('throttle:6,1')->name('verification.send');
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
Route::prefix('panel')->name('dashboard.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', function () {
        return match (Auth::user()->role) {
            Role::ADMIN => redirect()->route('dashboard.admin.home'),
            Role::EMPLOYEE => redirect()->route('dashboard.employee.home'),
            Role::USER => redirect()->route('dashboard.user.home'),
            default => redirect()->route('dashboard.index'),
        };
    })->name('index');

    Route::middleware(\App\Http\Middleware\CheckUserRole::class)->group(function () {
        Route::get('/index', [UserController::class, 'home'])->name('user.home'); // Обычный пользователь
        Route::get('/employee/home', [EmployeeController::class, 'home'])->name('employee.home'); // Сотрудник
        Route::get('/admin/home', [AdminController::class, 'home'])->name('admin.home'); // Администратор
    });
});
