<?php

namespace App\Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:255'],
            'lastname' => ['required', 'max:255'],
            'patronymic' => ['required', 'max:255'],
            'number_phone' => ['required', 'max:255'],
            'date_of_birth' => ['required', 'max:255'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
