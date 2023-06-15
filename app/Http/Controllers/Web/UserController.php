<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Modules\Doctor\Entities\Doctor;
use App\Modules\Patient\Entities\Patient;
use App\Rules\ValidationPhoneRule;
use Auth;
use Illuminate\Http\Request;

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
                ->where('lastname', 'ilike', '%'.$data['doctor'].'%')
                ->orWhere('post', 'ilike', '%'.$data['doctor'].'%');
        }
        $doctors = $doctors->paginate(10);
        return view('app.admin.doctors', ['doctors' => $doctors]);
    }

    public function viewPatients(Request $request)
    {
        $data = $request->all();
        $patients = Patient::query();
        if (!empty($data['patient'])) {
            $patients
                ->where('patients.lastname', 'ilike', '%'.$data['patient'].'%')
                ->orWhereHas('doctor', function ($query) use ($data) {
                    $query->where('lastname', 'ilike', '%'.$data['patient'].'%');
                });
        }

        $patients = $patients->paginate(10);
        return view('app.admin.patients', ['patients' => $patients]);
    }
}
