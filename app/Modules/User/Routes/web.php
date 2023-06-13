<?php

use App\Modules\User\Http\Controllers\Web\AuthController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::prefix('auth')->group(function () {
    Route::get('/register', AuthController::class . "@registerView");
    Route::post('/register', AuthController::class . "@register")
        ->name('register.post');
    Route::get('/login', AuthController::class . "@loginView")->name('login');
    Route::post('/login', AuthController::class . "@login")
        ->name('login.post');
});


Route::middleware(['auth:doctor,patient,admin'])->group(function () {
    Route::get('/my', \App\Modules\User\Http\Controllers\Web\UserController::class . '@viewMy')
        ->name('my')->middleware('verified');

    Route::post('/my', \App\Modules\User\Http\Controllers\Web\UserController::class . '@setUser')
        ->name('my.post')->middleware('verified');

    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/my');
    })->middleware('signed')->name('verification.verify');

    Route::post('/logout', AuthController::class . '@logout')
        ->name('logout');
});
