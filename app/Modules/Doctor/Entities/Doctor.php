<?php

namespace App\Modules\Doctor\Entities;

use App\Mail\User\PasswordMail;
use App\Modules\Patient\Entities\Patient;
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
class Doctor extends Authenticatable implements MustVerifyEmail
{
    use UserTraits, HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'lastname',
        'midname',
        'number_phone',
        'email',
        'gender',
        'bdate',
        'post',
        'password',
        'email_verified_at'
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

    protected $table = 'doctors';

    protected static function newFactory()
    {
        return \App\Modules\Doctor\Database\factories\DoctorFactory::new();
    }

    public function patients()
    {
        return $this->belongsToMany(Patient::class, 'doctors_patients', 'doctor_id', 'patient_id')
            ->withPivot('created_at', 'comment');
    }

    static public function doctorById($id)
    {
        return self::query()->where('id', $id)->first();
    }

    static public function create($data)
    {
        $password = \Str::random(8);
        $data['password'] = Hash::make($password);
        $data['email_verified_at'] = \Date::now();

        if ($doctor = self::createUser($data)) {
            Mail::to($data['email'])->send(new PasswordMail($password));
        }

        return $doctor;
    }
}
