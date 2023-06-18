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

Route::prefix('doctor')->middleware('auth:doctor')->group(function() {
    Route::post('/add-my-patient', \App\Modules\Doctor\Http\Controllers\DoctorController::class .'@addMyPatient')
        ->name('add-my-patient.post');

    Route::post('/del-my-patient', \App\Modules\Doctor\Http\Controllers\DoctorController::class .'@delMyPatient')
        ->name('del-my-patient.post');
});
