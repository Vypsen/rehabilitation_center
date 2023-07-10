<?php

namespace App\Modules\Patient\Http\Controllers\Web;

use App\Modules\Patient\Entities\Patient;
use Illuminate\Routing\Controller;

class RecoverController extends Controller
{
    public function getRecover()
    {
        $user = \Auth::user();

        $skill = $user->notCanSkill();
        $key = array_search(false, $skill);
        $exercises = config('recover')[$key];

        $doctors = $user->doctors;

        return view('app.patient.recover', ['user' => $user, 'exercises' => $exercises, 'doctors' => $doctors]);
    }
}
