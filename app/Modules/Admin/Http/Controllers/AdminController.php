<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Modules\Doctor\Entities\Doctor;
use App\Modules\Patient\Entities\Patient;
use App\Modules\User\Rules\ValidationPhoneRule;
use DB;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
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


    public function createDoctor(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:doctors',
            'number_phone' => ['required', new ValidationPhoneRule],
        ]);

        $data = $request->all();
        $doctor = Doctor::createFormRequest($data);
        $doctor->post = $data['post'];
        $doctor->save();
        event(new Registered($doctor));


        return redirect(route('my'));
    }


}
