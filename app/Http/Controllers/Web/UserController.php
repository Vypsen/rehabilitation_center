<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Modules\Doctor\Entities\Doctor;
use App\Modules\Patient\Entities\Patient;
use App\Rules\ValidationPhoneRule;
use Auth;
use Illuminate\Http\Request;
use function Termwind\render;

class UserController extends Controller
{
    public function viewMy()
    {
        $user = Auth::user();

        return view('app.my', ['user' => $user]);

//        $guard = Auth::getDefaultDriver();
//        if ($guard == 'patient') {
//            return view('app.patient.user', ['user' => $user]);
//        } elseif ($guard == 'admin') return view('app.admin.admin', ['user' => $user]);
//        else return view('app.doctor.doctor', ['user' => $user]);
    }

    public function setUser(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'number_phone' => ['required', new ValidationPhoneRule],
        ]);


        $data = $request->all();

        $user->fill($data);
        $user->save();

        return redirect('/');
    }

    public function viewDoctors(Request $request)
    {
        $data = $request->all();
        $doctors = Doctor::query();
        if (!empty($data['doctor'])) {
            $doctors
                ->where('lastname', 'ilike', '%' . $data['doctor'] . '%')
                ->orWhere('post', 'ilike', '%' . $data['doctor'] . '%');
        }
        $doctors = $doctors->paginate(10);
        return view('app.doctors', ['doctors' => $doctors]);
    }

    public function viewPatients(Request $request)
    {
        $data = $request->all();
        $patients = Patient::query();
        if (!empty($data['my_patients'])) {
            $patients = Auth::user()->patients();
        }
        if (!empty($data['patient'])) {
            $patients
                ->where('patients.lastname', 'ilike', '%' . $data['patient'] . '%');
        }
        if (!empty($data['doctor_lastname'])) {
            $patients
                ->whereHas('doctors', function ($query) use ($data) {
                    $query->where('lastname', 'ilike', '%' . $data['doctor_lastname'] . '%');
                });
        }

        $patients = $patients->paginate(10);
        return view('app.patients', ['patients' => $patients]);
    }

    public function patient($id)
    {
        $patient = Patient::query()->where('id', $id)->first();

        return view('app.view-patient', ['patient' => $patient]);
    }
}
