<?php

namespace App\Modules\User\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Modules\User\Rules\ValidationPhoneRule;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function viewMy()
    {
        $user = Auth::user();
        return view('app.user', ['user' => $user]);
    }

    public function setUser(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'number_phone' => ['required', new ValidationPhoneRule],
        ]);

        $data = $request->all();
        $user->bdate = strtotime($data['bdate']);

        $user->fill($data);
        $user->save();

        return redirect(route('patient'));
    }
}
