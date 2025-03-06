<?php

use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\AnimalController;
use App\Http\Controllers\Admin\AnimalPetController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Api\VerificationController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'welcome'])->name('index');

Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login.show');
    Route::post('/login', 'auth')->name('login.auth');
    Route::get('/register', 'register')->name('register.show');
    Route::post('/register', 'store')->name('register.store');
});

Route::middleware('auth')->group(function () {
   Route::get('/email/verify', [VerificationController::class, 'verificationNotice'])->name('verification.notice');
   Route::post('/email/verification-notification', [VerificationController::class, 'verificationSend'])->middleware('throttle:6,1')->name('verification.send');
   Route::middleware('signed')->get('/email/verify/{id}/{hash}', [VerificationController::class, 'verificationVerify'])->name('verification.verify');
});

Route::middleware('guest')->group(function () {
    Route::get('/password/reset', [AuthController::class, 'passwordReset'])->name('password.reset');
    Route::post('/password/reset', [AuthController::class, 'passwordResetStore'])->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/logout', 'logout')->name('logout');
    });
});

Route::prefix('/user')->name('user.')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::get('/', 'index')->name('home');
            Route::get('/forgot-password', 'forgotPassword')->name('forgot-password.show');
            Route::get('/forgot-password', 'forgotPasswordStore')->name('forgot-password.store');
        });
        Route::controller(ProfileController::class)->group(function () {
            Route::get('/profile', 'index')->name('profile');
            Route::post('/profile/update', 'update')->name('profile.update');
            Route::post('/profile/delete', 'delete')->name('profile.delete');
        });
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/change-password', 'changePassword')->name('change-password');
        Route::post('/change-password', 'passwordStore')->name('change-password.store');
    });
});

Route::prefix('/admin')->name('admin.')->group(function () {
    Route::middleware('auth', 'super-admin')->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::get('/', 'index')->name('home');
        });

        Route::middleware('super-admin')->group(function () {
            Route::resource('/users', UserController::class);
            Route::resource('/cities', CityController::class);
            Route::resource('/countries', CountryController::class);
            Route::resource('/addresses', AddressController::class);
            Route::resource('/animals', AnimalController::class);
            Route::resource('/animal_pets', AnimalPetController::class);
        });

        Route::controller(UserController::class)->group(function () {
            Route::get('/change-password', 'changePassword')->name('change-password');
            Route::post('/change-password', 'passwordStore')->name('change-password.store');
        });
    });
});
