<?php

use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\AnimalController;
use App\Http\Controllers\Admin\AnimalPetController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\FileUploadController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VideoController;
use Illuminate\Support\Facades\Route;

// Главная страница для всех
Route::get('/', [AuthController::class, 'welcome'])->name('index');

// Единые маршруты для авторизации и регистрации
Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login.show');
    Route::post('/login', 'auth')->name('login');
    Route::get('/register', 'register')->name('register.show');
    Route::post('/register', 'signup')->name('signup');
});

Route::middleware('auth')->controller(AuthController::class)->group(function () {
    Route::get('/logout', 'logout')->name('logout');
});

// Маршруты для загрузки файлов
Route::post('/file/upload', [FileUploadController::class, 'upload'])->name('file.upload');
Route::delete('/file/delete', [FileUploadController::class, 'delete'])->name('file.delete');

// Админская панель
Route::prefix('/admin')->name('admin.')->middleware('auth')->group(function () {
    Route::middleware('super-admin')->group(function () {
        Route::get('/', [AuthController::class, 'index'])->name('home');
        Route::resource('users', UserController::class);
        Route::resource('countries', CountryController::class);
        Route::resource('cities', CityController::class);
        Route::resource('animals', AnimalController::class);
        Route::resource('animal-pets', AnimalPetController::class);
        Route::resource('addresses', AddressController::class);
        Route::resource('photos', PhotoController::class);
        Route::resource('videos', VideoController::class);
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/change-password', 'changePassword')->name('change-password');
        Route::post('/change-password', 'passwordStore')->name('change-password.store');
    });
});
