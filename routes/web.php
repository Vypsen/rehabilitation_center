<?php

use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\UserController;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


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

    Route::get('/forgot-password', function () {
        return view('auth.forgot-password');
    })->middleware('guest')->name('password.request');

    Route::post('/forgot-password', function (Request $request) {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    })->middleware('guest')->name('password.email');

    Route::get('/reset-password/{token}', function ($token) {
        return view('auth.reset-password', ['token' => $token]);
    })->middleware('guest')->name('password.reset');

    Route::post('/reset-password', function (Request $request) {
         $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    })->middleware('guest')->name('password.update');
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

Route::get('/error', function () {
    return 123;
})->name('error');
