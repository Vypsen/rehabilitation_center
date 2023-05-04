<?php

use App\Modules\Mobility\Http\Controllers\MobilityController;

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('mobility')->group(function () {
        Route::get('/', MobilityController::class . '@getMobility');
        Route::post('/set', MobilityController::class . '@setMobility');
    });
});
