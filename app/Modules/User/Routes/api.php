<?php

use App\Modules\User\Http\Controllers\AuthController;
use App\Modules\User\Http\Controllers\MobilityController;

Route::prefix('auth')->group(function () {
    Route::post('/register', AuthController::class . '@register');
    Route::post('/login', AuthController::class . '@login');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', AuthController::class . '@getUser');
    Route::post('/logout', AuthController::class . '@logout');

    Route::prefix('mobility')->group(function () {
        Route::get('/', MobilityController::class . '@getMobility');
        Route::post('/set', MobilityController::class . '@setMobility');
    });
});

Route::get('/test', function () {
    return response()->json(['123' => 'tests'], 401);
});

