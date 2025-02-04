<?php

use App\Http\Controllers\Api\AnimalController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/refresh-token', [AuthController::class, 'refreshToken']);
    Route::apiResource('/animals', AnimalController::class);
});
