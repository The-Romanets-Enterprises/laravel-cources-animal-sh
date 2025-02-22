<?php

use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\AnimalController;
use App\Http\Controllers\Admin\AnimalPetController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\UserAuthController;
use App\Http\Controllers\FilePondController;
use Illuminate\Support\Facades\Route;

Route::prefix('/user')->name('user.')->group(function () {
    Route::middleware('guest')->controller(UserAuthController::class)->group(function () {
        Route::get('/login', 'login')->name('login.show');
        Route::post('/login', 'auth')->name('login.auth');
        Route::get('/register', 'register')->name('register.show');
        Route::post('/register', 'store')->name('register.store');
    });

    Route::middleware('auth')->group(function () {
        Route::controller(UserAuthController::class)->group(function () {
            Route::get('/logout', 'logout')->name('logout');
            Route::get('/', 'index')->name('home');
        });
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/change-password', 'changePassword')->name('change-password');
        Route::post('/change-password', 'passwordStore')->name('change-password.store');
    });
});

Route::prefix('/admin')->name('admin.')->group(function () {
    Route::middleware('guest')->controller(AuthController::class)->group(function () {
        Route::get('/login', 'login')->name('login.show');
        Route::post('/login', 'auth')->name('login.auth');
    });
    Route::middleware('auth', 'super-admin')->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::get('/logout', 'logout')->name('logout');
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
