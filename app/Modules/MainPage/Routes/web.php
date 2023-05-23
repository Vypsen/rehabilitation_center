<?php

use App\Modules\MainPage\Http\Controllers\Web\PageController;


Route::middleware('auth')->group(function () {
    Route::get('/page', PageController::class . '@viewPage')
        ->name('page');
});
