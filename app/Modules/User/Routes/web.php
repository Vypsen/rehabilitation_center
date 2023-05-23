<?php

use App\Modules\User\Http\Controllers\Web\AuthController;

Route::prefix('auth')->group(function () {
    Route::get('/register', AuthController::class . "@registerView");
    Route::post('/register', AuthController::class . "@register")
        ->name('register.post');
    Route::get('/login', AuthController::class . "@loginView");
    Route::post('/login', AuthController::class . "@login")
        ->name('login.post');
});

Route::post('/logout', AuthController::class . '@logout')
    ->name('logout');


Route::middleware('auth:doctor')->group(function () {
    Route::get('/my', \App\Modules\User\Http\Controllers\Web\UserController::class . '@viewMy')
        ->name('my');

    Route::post('/my', \App\Modules\User\Http\Controllers\Web\UserController::class . '@setUser')
        ->name('my.post');
});
