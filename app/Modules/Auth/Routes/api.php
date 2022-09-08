<?php

use Illuminate\Http\Request;
use App\Modules\Auth\Http\Controllers\AuthController;

Route::prefix('auth')->group(function () {
    Route::post('/register', AuthController::class . '@register');
    Route::post('/login', AuthController::class . '@login');
    Route::post('/logout', AuthController::class . '@logout');
});

Route::middleware('auth:sanctum')->get('/user', AuthController::class . '@isUser');
