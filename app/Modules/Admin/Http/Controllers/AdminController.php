<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Mail\User\PasswordMail;
use App\Modules\Admin\Entities\Admin;
use App\Modules\Doctor\Entities\Doctor;
use App\Rules\ValidationPhoneRule;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Mail;

class AdminController extends Controller
{
    public function createDoctorView()
    {
        return view('app.admin.create_doctor');
    }

    public function createAdminView()
    {
        return view('app.admin.create_admin');
    }

    public function createDoctor(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:doctors',
            'number_phone' => ['required', new ValidationPhoneRule],
        ]);

        Doctor::create($request->all());
        return redirect(route('search-doctors'));
    }

    public function createAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:admins',
            'number_phone' => ['required', new ValidationPhoneRule],
        ]);

        Admin::create($request->all());
        return redirect(route('search-admins'));
    }

    public function viewAdmins(Request $request)
    {
        $data = $request->all();
        $admins = Admin::query();

        if (!empty($data['admin'])) {
            $admins
                ->where('admins.lastname', 'ilike', '%' . $data['admin'] . '%');
        }

        $admins = $admins->paginate(10);
        return view('app.admin.admins', ['admins' => $admins]);
    }

}
