<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiHelpersRolesTraits
{
    protected function isAdmin($user): bool
    {
        if (!empty($user)) {
            return $user->tokenCan('admin');
        }

        return false;
    }

    protected function isDoctor($user): bool
    {

        if (!empty($user)) {
        return $user->tokenCan('doctor');
    }

        return false;
    }

    protected function isPatient($user): bool
    {
        if (!empty($user)) {
            return $user->tokenCan('patient');
        }

        return false;
    }

    protected function onSuccess($data, string $message = '', int $code = 200): JsonResponse
    {
        return response()->json([
            'status' => $code,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    protected function onError(int $code, string $message = ''): JsonResponse
    {
        return response()->json([
            'status' => $code,
            'message' => $message,
        ], $code);
    }


}
