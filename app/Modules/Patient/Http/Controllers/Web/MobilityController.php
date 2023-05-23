<?php

namespace App\Modules\Patient\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Modules\Mobility\Entities\Mobility;
use Auth;
use DB;
use Illuminate\Http\Request;

class MobilityController extends Controller
{
    public function viewMobility(Request $request)
    {
        $mobilityName = DB::table('mobility_name')->get();

        try {
            $userMobility = Mobility::query()
                ->where('id_user', '=', Auth::user()->id)
                ->latest()
                ->first()
                ->toArray();

        } catch (\Exception $exception) {
            $userMobility = [];
        }
        return view('page.patient_info', ['mobility' => $mobilityName, 'userMobility' => $userMobility]);
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

        $userId = Auth::user()->id;
        $mobility = Mobility::createCurrentCondition($userId, $data);

        return redirect('/');
    }
}
