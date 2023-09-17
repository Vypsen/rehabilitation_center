<?php

namespace App\Modules\Patient\Entities;

use App\Http\Middleware\Authenticate;
use App\Modules\Doctor\Entities\Doctor;
use App\Modules\Patient\Database\factories\PatientFactory;
use App\Modules\User\Entities\User;
use App\Traits\UserTraits;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
 * @property mixed $bdate
 * @property string $email
 * @property string $password
 * @property string|null $email_verified_at
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $doctor_id
 */
class Patient extends Authenticatable implements MustVerifyEmail
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

    protected $table = 'patients';

    protected static function newFactory()
    {
        return PatientFactory::new();
    }

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
        $user->password = Hash::make($requestData['password']);

        $user->save();
        return $user;
    }

    public function generalInfo()
    {
        return $this->hasOne(GeneralInfoPatient::class, 'patient_id');
    }

    public function trackedInfo()
    {
        return $this->hasMany(TrackedInfoPatient::class, 'patient_id');
    }

    public function lastTrackedInfo()
    {
        return $this->trackedInfo()->latest()->first();
    }

    public function skills()
    {
        return $this->hasMany(Skills::class);
    }

    public function notCanSkill()
    {
        return $this->lastSkills()->get()->toArray()[0];
    }

    public function lastSkills()
    {
        return $this->skills()->latest()->first();
    }

    public static function getAllPatients()
    {
        return self::all();
    }

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'doctors_patients', 'patient_id', 'doctor_id')
            ->withPivot('created_at', 'comment');
    }
}
