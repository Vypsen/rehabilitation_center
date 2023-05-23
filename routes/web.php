<?php

use App\Modules\User\Http\Controllers\Web\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('/', function (Request $request) {
    return route('user');
});
