<?php

use App\Modules\MainPage\Http\Controllers\PageController;

Route::middleware('auth')->group(function () {
    Route::get('/', PageController::class . '@pageView')
        ->name('page');
});
