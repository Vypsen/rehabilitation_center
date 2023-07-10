<?php


Route::prefix('doctor')->middleware('auth:doctor')->group(function() {
    Route::post('/add-my-patient', \App\Modules\Doctor\Http\Controllers\DoctorController::class .'@addMyPatient')
        ->name('add-my-patient.post');

    Route::post('/del-my-patient', \App\Modules\Doctor\Http\Controllers\DoctorController::class .'@delMyPatient')
        ->name('del-my-patient.post');

    Route::post('/comment', \App\Modules\Doctor\Http\Controllers\DoctorController::class .'@setComment')
        ->name('set-comment.post');
});
