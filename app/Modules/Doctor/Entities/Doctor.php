<?php

namespace App\Modules\Doctor\Entities;

use App\Modules\User\Entities\User;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int $id
 * @property string $name
 * @property string $lastname
 * @property string $midname
 * @property string $gender
 * @property string $post
 * @property string $number_phone
 * @property mixed $bdate
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Doctor extends User
{

    protected $table = 'doctors';

    protected static function newFactory()
    {
        return \App\Modules\Doctor\Database\factories\DoctorFactory::new();
    }

}
