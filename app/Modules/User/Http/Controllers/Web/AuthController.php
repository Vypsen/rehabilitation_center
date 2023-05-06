<?php

namespace App\Modules\User\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Modules\User\Entities\User;
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
            'disease' => 'required',
            'brain-side' => '',
            'number_phone' => 'required',
        ]);

        $user = User::createFormRequest($data);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect(route('mobility'));
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($data, true)) {
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
