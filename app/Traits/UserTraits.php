<?php

namespace App\Traits;

use Illuminate\Support\Facades\Hash;

trait UserTraits
{
    public static function createFormRequest(array $requestData): self
    {
        $user = new self();
        $user->name = $requestData['name'];
        $user->lastname = $requestData['lastname'];
        $user->midname = $requestData['midname'];
        $user->gender = $requestData['gender'];
        $user->bdate = $requestData['bdate'];
        $user->number_phone = $requestData['number_phone'];
        $user->email = $requestData['email'];
        $user->password = Hash::make(123);

        return $user;
    }

    public function getFullName()
    {
        return "$this->lastname $this->name $this->midname";
    }

    public function getAge()
    {
        $age = floor((time() - strtotime($this->bdate)) / 31556926);
        return $age;
    }
}
