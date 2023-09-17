<?php

namespace App\Modules\Admin\Entities;

use App\Mail\User\PasswordMail;
use App\Traits\UserTraits;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Sanctum\HasApiTokens;

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
class Admin extends Authenticatable implements MustVerifyEmail
{
    use UserTraits, HasApiTokens, HasFactory, Notifiable;

    protected $table = 'admins';

    protected $fillable = [
        'name',
        'lastname',
        'midname',
        'number_phone',
        'email',
        'gender',
        'bdate',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'registration_at' => 'datetime',
    ];

    static public function create($data)
    {
        $password = \Str::random(8);
        $data['password'] = Hash::make($password);
        $data['email_verified_at'] = \Date::now();

        if ($admin = self::createUser($data)) {
            Mail::to($data['email'])->send(new PasswordMail($password));
        }

        return $admin;
    }
}
