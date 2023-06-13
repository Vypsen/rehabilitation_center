<?php

namespace App\Modules\Patient\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Modules\Patient\Entities\GeneralInfoPatient;
use App\Modules\Patient\Entities\TrackedInfoPatient;
use Auth;
use DB;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public  function viewPatient(Request $request)
    {

        $patient = Auth::user()->generalInfo;
        if (!$patient) $patient = new GeneralInfoPatient();
        return view('app.patient.patient_info', ['patient' => $patient]);
    }

    public function setPatient(Request $request)
    {
        $data = $request->all();
        if (!Auth::user()->generalInfo) {
            $pInfo = new GeneralInfoPatient();
            $pInfo->patient_id = Auth::user()->id;
            $pInfo->fill($data);

        } else {
            $pInfo = Auth::user()->generalInfo;
            $pInfo->fill($data);
        }

        $pInfo->save();

        return redirect(route('patient'));
    }

    public function viewTrackedData(Request $request)
    {
        $patient = Auth::user()->lastTrackedInfo();
        if (!$patient) $patient = new TrackedInfoPatient();

        $SRM_data = DB::table('SRM_descr')->get()->all();
        return view('app.patient.special_patient_info', ['patient' => $patient, 'srm' => $SRM_data]);
    }

    public function setTrackedData(Request $request)
    {
        $data = $request->all();
        $tInfo = new TrackedInfoPatient();
        $tInfo->patient_id = Auth::user()->id;
        $tInfo->fill($data);

        $tInfo->save();

        return redirect(route('tracked-patient-data'));
    }
}
