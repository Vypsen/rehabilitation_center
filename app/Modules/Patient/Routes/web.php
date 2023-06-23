<?php

Route::middleware(['auth:patient', 'verified'])->group(function () {
    Route::get('/skills', \App\Modules\Patient\Http\Controllers\Web\SkillsController::class . '@viewSkills')
        ->name('skills');

    Route::get('/recover', \App\Modules\Patient\Http\Controllers\Web\RecoverController::class . '@getRecover')
        ->name('recover');

    Route::post('/skills', \App\Modules\Patient\Http\Controllers\Web\SkillsController::class . '@setSkills')
        ->name('skills.post');

    Route::post('/patient', \App\Modules\Patient\Http\Controllers\Web\PatientController::class . '@setPatient')
        ->name('patient.post');

    Route::get('/patient', \App\Modules\Patient\Http\Controllers\Web\PatientController::class . '@viewPatient')
        ->name('patient');

    Route::get('/tracked-patient-data', \App\Modules\Patient\Http\Controllers\Web\PatientController::class . '@viewTrackedData')
        ->name('tracked-patient-data');

    Route::post('/tracked-patient-data', \App\Modules\Patient\Http\Controllers\Web\PatientController::class . '@setTrackedData')
        ->name('tracked-patient-data.post');
});
