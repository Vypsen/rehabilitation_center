<?php

namespace App\Modules\Patient\Entities;

use App\Http\Middleware\Authenticate;
use App\Modules\User\Entities\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

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
class Patient extends User
{
    use Notifiable;

    protected $table = 'patients';

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

    public function lastSkills()
    {
        return $this->skills()->latest()->first();
    }
}
