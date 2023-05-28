<?php

Route::middleware(['auth:patient'])->group(function () {
    Route::get('/mobility', \App\Modules\Patient\Http\Controllers\Web\MobilityController::class . '@viewMobility')
        ->name('mobility');

    Route::get('/user', \App\Modules\Patient\Http\Controllers\Web\MobilityController::class . '@viewMobilityAll')
        ->name('user');

    Route::post('/new_mobility', \App\Modules\Patient\Http\Controllers\Web\MobilityController::class . '@setMobility')
        ->name('new_mobility');

    Route::post('/patient', \App\Modules\Patient\Http\Controllers\Web\PatientController::class . '@setPatient')
        ->name('patient_info.post');

    Route::get('/patient', \App\Modules\Patient\Http\Controllers\Web\PatientController::class . '@viewPatient')
        ->name('patient_info');
});
