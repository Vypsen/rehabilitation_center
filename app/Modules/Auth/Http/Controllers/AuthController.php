<?php

namespace App\Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\Auth\Http\Requests\LoginApiRequest;
use App\Modules\Auth\Http\Requests\RegisterApiRequest;
use App\OpenApi\Parameters\Auth\LoginParameters;
use App\OpenApi\Parameters\Auth\RegisterParameters;
use App\OpenApi\Responses\Auth\FailedValidationResponse;
use App\OpenApi\Responses\Auth\GetUserResponse;
use App\OpenApi\Responses\Auth\UserTokenResponse;
use App\OpenApi\Responses\Auth\LogoutUserResponse;
use App\OpenApi\Responses\Auth\NotFoundUserResponse;
use App\OpenApi\Responses\Auth\RegisterResponse;
use Auth;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Request;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
class AuthController extends Controller
{
    /**
     * isUser
     * @param Request
     * @return JsonResponse
     * @return Responsable
     */
    #[OpenApi\Operation(tags: ['auth'], method: 'GET')]
    #[OpenApi\Response(GetUserResponse::class, statusCode: 200)]
    #[OpenApi\Response(NotFoundUserResponse::class, statusCode: 401)]
    public function isUser(Request $request)
    {
        return $request->user();
    }

    /**
     * register user
     * @param RegisterApiRequest
     * @return JsonResponse
     * @return Responsable
     */
    #[OpenApi\Operation(tags: ['auth'], method: 'POST')]
    #[OpenApi\Parameters(RegisterParameters::class)]
    #[OpenApi\Response(UserTokenResponse::class, statusCode: 200)]
    #[OpenApi\Response(FailedValidationResponse::class, statusCode: 422)]
    public function register(RegisterApiRequest $request)
    {
        $data = $request->validated();
        $user = User::createFormRequest($data);

        $authToken = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'user' => $user,
            'authToken' => $authToken,
        ]);
    }

    /**
     * login user
     * @param LoginApiRequest
     * @return JsonResponse
     * @return Responsable
     */
    #[OpenApi\Operation(tags: ['auth'], method: 'POST')]
    #[OpenApi\Parameters(LoginParameters::class)]
    #[OpenApi\Response(UserTokenResponse::class, statusCode: 200)]
    #[OpenApi\Response(FailedValidationResponse::class, statusCode: 422)]
    #[OpenApi\Response(NotFoundUserResponse::class, statusCode: 401)]
    public function login(LoginApiRequest $request)
    {
        $data = $request->validated();
        $user = User::query()->where('email', $data['email'])->first();
        if(!$user){
            return response()->json([
                $data['email'] => 'user not found',
            ], 401);
        }

        if (Auth::attempt($data, true)) {
            $user = Auth::user();

            $user->save();

            $authToken = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'user' => $user,
                'authToken' => $authToken,
            ]);
        }

        return response()->json([
            $data['email'] => 'invalid password',
        ], 401);
    }

    /**
     * logout user
     * @return JsonResponse
     * @return Responsable
     */
    #[OpenApi\Operation(tags: ['auth'], method: 'POST')]
    #[OpenApi\Response(factory: LogoutUserResponse::class, statusCode: 200)]
    public function logout(Request $request)
    {
        $user = $request->user();

        $user->currentAccessToken()->delete();

        return response()->json('Successfull logout');
    }
}
