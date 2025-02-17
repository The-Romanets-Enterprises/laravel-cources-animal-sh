<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/forgot-password', function () {
    return view('layouts.forgot-password');
})->name('forgot-password');

Route::get('/logout', function () {
    return view('layouts.logout');
})->name('logout');

Route::get('/confirm-mail', function () {
    return view('layouts.confirm-mail');
})->name('confirm-mail');

Route::get('/reset-password', function () {
    return view('layouts.reset-password');
})->name('reset-password');

Route::get('/google-authenticator-lock', function () {
    return view('layouts.google-authenticator-lock');
})->name('google-authenticator-lock');


Route::get('/404', function () {
    return view('dashboard.404');
})->name('404');


Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login.show');
    Route::post('/login', 'auth')->name('login.auth');
});

Route::prefix('/admin')->name('admin.')->middleware('auth')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/logout', 'logout')->name('logout');
        Route::get('/', 'index')->name('home');
    });

    Route::middleware('super-admin')->group(function () {
        Route::resource('/users', UserController::class);
    });
});
