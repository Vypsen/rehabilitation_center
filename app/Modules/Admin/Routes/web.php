<?php

use App\Modules\Admin\Http\Controllers\AdminController;

Route::prefix('create')->group(function () {
    Route::get('/doctor', AdminController::class . "@createDoctor");
    Route::post('/doctor', AdminController::class . "@register")
        ->name('create-doctor.post');
    Route::get('/admin', AdminController::class . "@loginView");
    Route::post('/admin', AdminController::class . "@login")
        ->name('create-admin.post');
});

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/doctors', AdminController::class . "@viewDoctors")->name('search-doctors');
    Route::get('/admins', AdminController::class . "@viewAdmins");
    Route::get('/patients', AdminController::class . "@viewPatients")->name('search-patients');
});
