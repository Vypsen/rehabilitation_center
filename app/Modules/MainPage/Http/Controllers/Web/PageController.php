<?php

namespace App\Modules\MainPage\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function viewPage()
    {
        return view('app.user');
    }
}
