<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Modules\Doctor\Entities\Doctor;
use App\Modules\Patient\Entities\Patient;
use App\Rules\ValidationPhoneRule;
use DB;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{



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
