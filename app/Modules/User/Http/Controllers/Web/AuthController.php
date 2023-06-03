<?php

namespace App\Modules\User\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Modules\Patient\Entities\Patient;
use App\Modules\User\Entities\User;
use App\Modules\User\Rules\ValidationPhoneRule;
use Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registerView()
    {
        return view('auth.register');
    }

    public function loginView()
    {
        return view('auth.login');
    }

    public function homeView()
    {
        return view('home');
    }

    public function userView()
    {
        return view(route('my'));
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'midname' => 'required',
            'bdate' => 'required',
            'email' => 'required|unique:patients',
            'password' => 'required',
            'gender' => 'required',
            'number_phone' => ['required', new ValidationPhoneRule],
        ]);


        $user = Patient::createFormRequest($data);

        event(new Registered($user));
        Auth::guard('patient')->login($user);
        $request->session()->regenerate();

//        return redirect(route('my'));
        return redirect(route('my'));
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $guard = 'patient';

        if (Auth::guard($guard)->attempt($data, true)) {
            $request->session()->regenerate();
            return redirect((route('my')));
        }

        return back()->with(['email' => 'не найден']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }


}
