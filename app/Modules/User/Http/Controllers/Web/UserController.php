<?php

namespace App\Modules\User\Http\Controllers\Web;

use App\Http\Controllers\Controller;
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

        $data = $request->all();
        $user->bdate = strtotime($data['bdate']);

        $user->fill($data);
        $user->save();

        return view('app.user', ['user' => $user]);
    }

}
