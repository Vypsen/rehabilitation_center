<?php

namespace App\Traits;


trait UserTraits
{
    protected static function createUser(array $requestData): self
    {
        $user = new self();
        $user->fill($requestData);
        $user->save();

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
