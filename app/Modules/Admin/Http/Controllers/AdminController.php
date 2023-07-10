<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Modules\Doctor\Entities\Doctor;
use App\Rules\ValidationPhoneRule;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    public function createDoctorView()
    {
        return view('app.admin.create_doctor');
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

        return redirect(route('search-doctors'));
    }
}
