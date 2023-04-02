<?php

use App\Modules\User\Http\Controllers\AuthController;

Route::prefix('auth')->group(function () {
    Route::post('/register', AuthController::class . '@register');
    Route::post('/login', AuthController::class . '@login');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', AuthController::class . '@getUser');
    Route::post('/logout', AuthController::class . '@logout');
    Route::prefix('mobility')->group(function () {
        Route::get('/', \App\Modules\User\Http\Controllers\MobilityController::class . '@getMobility');
        Route::post('/set', \App\Modules\User\Http\Controllers\MobilityController::class . '@setMobility');
    });
});
