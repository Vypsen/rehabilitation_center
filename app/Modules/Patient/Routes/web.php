<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/mobility', \App\Modules\Patient\Http\Controllers\Web\MobilityController::class . '@viewMobility')
        ->name('mobility');

    Route::get('/user', \App\Modules\Patient\Http\Controllers\Web\MobilityController::class . '@viewMobilityAll')
        ->name('user');

    Route::post('/new_mobility', \App\Modules\Patient\Http\Controllers\Web\MobilityController::class . '@setMobility')
        ->name('new_mobility');

    Route::post('/patient', \App\Modules\Patient\Http\Controllers\Web\MobilityController::class . '@setPatientInfo')
        ->name('patient_info.post');

    Route::get('/patient', \App\Modules\Patient\Http\Controllers\Web\MobilityController::class . '@viewPatientInfo')
        ->name('patient_info');
});
