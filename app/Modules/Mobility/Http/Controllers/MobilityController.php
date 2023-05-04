<?php

namespace App\Modules\Mobility\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Mobility\Entities\Mobility;
use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class MobilityController extends Controller
{
    public function getMobility(Request $request)
    {
        $user = Auth::user();
        return response()->json(['user' => $user->mobility()->get()->last()], 200);
    }

    public function setMobility(Request $request)
    {
        try {
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
        } catch (ValidationException $exception) {
            return new JsonResponse([
                'errors' => $exception->errors(),
            ], 422);
        }

        $user = Auth::user();
        $mobility = Mobility::createCurrentCondition($user->id, $data);
        return response()->json(['mobility' => $mobility], 200);
    }

}
