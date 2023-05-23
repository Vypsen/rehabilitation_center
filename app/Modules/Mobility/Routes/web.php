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
    Route::get('/mobility', \App\Modules\Mobility\Http\Controllers\Web\MobilityController::class . '@viewMobility')
        ->name('mobility');

    Route::get('/mobility_all', \App\Modules\Mobility\Http\Controllers\Web\MobilityController::class . '@viewMobilityAll')
        ->name('mobility_list');

    Route::post('/new_mobility', \App\Modules\Mobility\Http\Controllers\Web\MobilityController::class . '@setMobility')
        ->name('new_mobility');
});
