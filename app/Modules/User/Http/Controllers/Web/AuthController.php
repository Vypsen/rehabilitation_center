<?php

namespace App\Modules\User\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Modules\User\Entities\User;
use App\Modules\User\Rules\ValidationPhoneRule;
use Auth;
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
            'email' => 'required|unique:users',
            'password' => 'required',
            'gender' => 'required',
            'number_phone' => ['required', new ValidationPhoneRule],
        ]);

        $user = User::createFormRequest($data);

        Auth::guard('patient')->login($user);
        $request->session()->regenerate();

        return redirect(route('mobility'));
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (User::query()->where('email', $data['email'])->first()->doctor)
        {
            $guard = 'doctor';
        } else if (User::query()->where('email', $data['email'])->first()->patient) {
            $guard = 'patient';
        }


            if (Auth::guard($guard)->attempt($data, true)) {
            $request->session()->regenerate();
            return redirect((route('mobility')));
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
