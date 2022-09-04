<?php

namespace Modules\Auth\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Modules\Auth\Http\Requests\RegisterApiRequest;

class AuthController extends Controller
{
    /**
     * register user
     * @param RegisterApiRequest
     * @return JsonResponse
     * @return Responsable
     */
    public function register(RegisterApiRequest $request)
    {
        $data = $request->validated();

        $user = User::query()
            ->where('email', $data->email)
            ->first();

        if($user){
          $user = User::createFormRequest($data);
        }
        else{
            return response()->json([
                $data['email'] => 'user already exist',
            ], 403);
        }

        $authToken = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'authToken' => $authToken,
        ]);
    }
}
