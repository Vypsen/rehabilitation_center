<?php

namespace App\Modules\MainPage\Http\Controllers;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function pageView()
    {
        return view('page.main');
    }
}
