<?php

use App\Modules\Admin\Http\Controllers\AdminController;

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::prefix('create')->group(function () {
        Route::get('/doctor', AdminController::class . "@createDoctorView")
            ->name('create-doctor');

        Route::post('/doctor', AdminController::class . "@createDoctor")
            ->name('create-doctor.post');

        Route::get('/admin', AdminController::class . "@createAdminView")
            ->name('create-admin');

        Route::post('/admin', AdminController::class . "@createAdmin")
            ->name('create-admin.post');
    });

    Route::get('/doctor', AdminController::class . "@viewDoctor")
        ->name('view-doctor');

    Route::post('/doctor', AdminController::class . "@changeDoctor")
        ->name('change-doctor');


    Route::get('/admins', AdminController::class . "@viewAdmins")
        ->name('search-admins');


});
