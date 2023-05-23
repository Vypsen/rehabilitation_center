<?php

namespace App\Modules\Patient\Entities;

use App\Modules\User\Entities\User;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $id_user
 * @property int|null $visit_date
 * @property int|null $disease_date
 * @property string|null $address
 * @property string|null $relatives_info
 * @property int|null $height
 * @property int|null $weight
 * @property string|null $type_body
 * @property string $disease
 * @property string $extra_disease
 * @property string|null $allergy
 * @property int|null $glucose
 * @property int|null $blood_pressure
 * @property int|null $Ps
 * @property int|null $SpO
 * @property string|null $diabetes
 * @property string|null $visual/sensory_extinction
 * @property string|null $swallowing
 * @property string|null $talk
 * @property string|null $dysphasia
 * @property string|null $nerv_status
 * @property string|null $orientation
 * @property string|null $anxiety
 * @property bool|null $arterial_hypertension
 * @property bool|null $ischemia
 * @property bool|null $fibrillation
 * @property bool|null $stents
 * @property bool|null $cardiostimulator
 * @property bool|null $dyspnoea
 * @property string|null $pain
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Patient extends Model
{
    protected $table = 'patients';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
