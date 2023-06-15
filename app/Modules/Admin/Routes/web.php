<?php

use App\Modules\Admin\Http\Controllers\AdminController;

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::prefix('create')->group(function () {
        Route::get('/doctor', AdminController::class . "@createDoctor");
        Route::post('/doctor', AdminController::class . "@register")
            ->name('create-doctor.post');
        Route::get('/admin', AdminController::class . "@loginView");
        Route::post('/admin', AdminController::class . "@login")
            ->name('create-admin.post');
    });

    Route::get('/admins', AdminController::class . "@viewAdmins")->name('search-admins');
});
