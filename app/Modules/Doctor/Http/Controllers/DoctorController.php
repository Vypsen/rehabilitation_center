<?php

namespace App\Modules\Doctor\Http\Controllers;

use App\Modules\Patient\Entities\Patient;
use Auth;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DoctorController extends Controller
{
    public function addMyPatient(Request $request)
    {
        $doctor = Auth::user();

        $idPatient = $request->all()['id'];
        $patient = Patient::query()->where('id', '=', $idPatient)->first();

        $doctor->patients()->save($patient);

        return true;
    }

    public function delMyPatient(Request $request)
    {
        $doctor = Auth::user();

        $idPatient = $request->all()['id'];
        $patient = Patient::query()->where('id', '=', $idPatient)->first();

        $doctor->patients()->detach($patient);

        return true;
    }
}
