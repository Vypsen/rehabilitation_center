<?php

use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;


Route::get('/', function (Request $request) {
    return redirect(route('my'));
});

Route::prefix('auth')->group(function () {
    Route::get('/register', AuthController::class . "@registerView");
    Route::post('/register', AuthController::class . "@register")
        ->name('register.post');
    Route::get('/login', AuthController::class . "@loginView")->name('login');
    Route::post('/login', AuthController::class . "@login")
        ->name('login.post');
});


Route::middleware(['auth:doctor,patient,admin'])->group(function () {
    Route::get('/my', \App\Http\Controllers\Web\UserController::class . '@viewMy')
        ->name('my')->middleware('verified');

    Route::post('/my', \App\Http\Controllers\Web\UserController::class . '@setUser')
        ->name('my.post')->middleware('verified');

    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/my');
    })->middleware('signed')->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        Auth::user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    })->middleware('throttle:6,1')->name('verification.send');

    Route::post('/logout', AuthController::class . '@logout')
        ->name('logout');
});

Route::middleware(['auth:doctor,admin'])->group(function () {
    Route::get('/doctors', UserController::class . "@viewDoctors")->name('search-doctors');
    Route::get('/patients', UserController::class . "@viewPatients")->name('search-patients');

    Route::get('/patient/{id}', UserController::class . "@patient")->name('view-patient');
});



