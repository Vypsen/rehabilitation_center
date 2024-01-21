<?php


Route::prefix('doctor')->middleware('auth:doctor')->group(function() {
    Route::post('/add-my-patient', \App\Modules\Doctor\Http\Controllers\DoctorController::class .'@addMyPatient')
        ->name('add-my-patient.post');

    Route::post('/del-my-patient', \App\Modules\Doctor\Http\Controllers\DoctorController::class .'@delMyPatient')
        ->name('del-my-patient.post');

    Route::post('/comment', \App\Modules\Doctor\Http\Controllers\DoctorController::class .'@setComment')
        ->name('set-comment.post');

    Route::get('/create-scale', \App\Modules\Doctor\Http\Controllers\ScalesController::class .'@createScaleView')
        ->name('create-scale');

    Route::post('/create-scale', \App\Modules\Doctor\Http\Controllers\ScalesController::class .'@createScale')
        ->name('create-scale.post');

    Route::get('/task-view', \App\Modules\Doctor\Http\Controllers\ScalesController::class .'@getTaskView')
        ->name('task-view');
});
