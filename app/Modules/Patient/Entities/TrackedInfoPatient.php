<?php

namespace App\Modules\Patient\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $patient_id
 * @property bool|null $hand_tactility
 * @property bool|null $hand_t
 * @property bool|null $hand_pain
 * @property bool|null $hand_musculoskeletal_feeling
 * @property bool|null $leg_tactility
 * @property bool|null $leg_t
 * @property bool|null $leg_pain
 * @property bool|null $leg_musculoskeletal_feeling
 * @property string|null $type_disorder
 * @property string|null $memory_loss
 * @property string|null $orientation
 * @property string|null $edema
 * @property bool|null $shortness
 * @property bool|null $cough
 * @property bool|null $asthma
 * @property bool|null $smoking
 * @property int|null $sleep_count
 * @property bool|null $insomnia
 * @property bool|null $sedatives
 * @property int $SRM
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class TrackedInfoPatient extends Model
{
    protected $table = 'patients_tracked_data';
    protected $guarded = [];


    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
