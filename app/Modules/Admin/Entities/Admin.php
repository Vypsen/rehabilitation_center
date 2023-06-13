<?php

namespace App\Modules\Admin\Entities;

use App\Modules\User\Entities\User;

/**
 * @property int $id
 * @property string $name
 * @property string $lastname
 * @property string $midname
 * @property string $gender
 * @property string $number_phone
 * @property mixed $bdate
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Admin extends User
{
    protected $table = 'admins';
}
