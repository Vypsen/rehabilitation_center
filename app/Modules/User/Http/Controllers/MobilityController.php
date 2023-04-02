<?php

namespace App\Modules\User\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Modules\User\Entities\Mobility;
use Auth;
use Illuminate\Http\Request;
class MobilityController extends Controller
{
    public function getMobility(Request $request)
    {
        $user = Auth::user();
        return response()->json(['user' => $user->mobility()->get()->last()], 200);
    }

    public function setMobility(Request $request)
    {
        $data = $request->validate([
            'lying_turn' => 'required',
            'sits_down' => 'required',
            'sits' => 'required',
            'gets_up' => 'required',
            'to_stand' => 'required',
            'get_up_sits_down' => 'required',
            'helps_walking_room' => 'required',
            'walking_street' => 'required',
            'stairwell' => 'required',
            'walking_room' => 'required',
            'raise_item' => 'required',
            'walks_gravel' => 'required',
            'washes' => 'required',
            'ladder' => 'required',
            'running' => 'required',
        ]);

        $user = Auth::user();
        $mobility = Mobility::createCurrentCondition($user->id, $data);


        return response()->json(['user' => Auth::user()->mobility()], 200);
    }

}
