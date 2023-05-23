<?php

namespace App\Modules\User\Entities;

use App\Modules\Mobility\Entities\Mobility;
use App\Modules\Patient\Entities\Patient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property int $id
 * @property string $name
 * @property string $lastname
 * @property string $midname
 * @property string $gender
 * @property string $number_phone
 * @property int $bdate
 * @property string $email
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $registration_at
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'midname',
        'number_phone',
        'date_of_birth',
        'email',
        'password',
    ];

    protected $guarded = ['role'];

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

    public static function createFormRequest(array $requestData): self
    {
        $user = new self();
        $user->name = $requestData['name'];
        $user->lastname = $requestData['lastname'];
        $user->midname = $requestData['midname'];
        $user->gender = $requestData['gender'];
        $user->bdate = strtotime($requestData['bdate']);
        $user->number_phone = $requestData['number_phone'];
        $user->email = $requestData['email'];
        $user->password = Hash::make($requestData['password']);

        $user->save();
        return $user;
    }

    public function mobility()
    {
        return $this->hasMany(Mobility::class, 'id_user');
    }

    public function doctor()
    {
        return $this->hasOne(Doctor::class, 'id_user');
    }

    public function patient()
    {
        return $this->hasOne(Patient::class, 'id_user');
    }

    protected static function newFactory()
    {
        return \App\Modules\User\Database\factories\UserFactory::new();
    }
}
