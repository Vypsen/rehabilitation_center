<?php

namespace App\Modules\Mobility\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Modules\Mobility\Entities\Mobility;
use DB;

class MobilityController extends Controller
{
    public function viewMobility()
    {
        $mobility = DB::table('mobility_name')->get();
        $userMobility = Mobility::query()->get();
        return view('page.mobility', ['mobility' => $mobility, 'userMobility' => $userMobility]);
    }
}
