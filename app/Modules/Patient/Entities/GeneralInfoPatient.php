<?php

namespace App\Modules\Patient\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $patient_id
 * @property int|null $visit_date
 * @property int|null $disease_date
 * @property string|null $address
 * @property string|null $relatives_info
 * @property int|null $height
 * @property int|null $weight
 * @property string|null $type_body
 * @property string|null $disease
 * @property string|null $extra_disease
 * @property string|null $allergy
 * @property string|null $glucose
 * @property string|null $blood_pressure
 * @property string|null $Ps
 * @property string|null $SpO
 * @property string|null $diabetes
 * @property string|null $visual_or_sensory_extinction
 * @property string|null $swallowing
 * @property string|null $talk
 * @property string|null $dysphasia
 * @property string|null $nerv_status
 * @property string|null $anxiety
 * @property string|null $cardio_system
 * @property bool|null $stents
 * @property bool|null $cardiostimulator
 * @property string|null $pain_place
 * @property string|null $pain_periodicity
 * @property bool|null $skin_damage
 * @property string|null $skin_damage_place
 * @property bool|null $urine_incontinence
 * @property bool|null $frequent_urination
 * @property int|null $nikturia_count
 * @property bool|null $urinary_catheter
 * @property bool|null $rep_urinary_infection
 * @property string|null $urine_features
 * @property bool|null $excrement_incontinence
 * @property int|null $defecation_count
 * @property bool|null $laxative
 * @property int|null $laxative_count
 * @property string|null $laxative_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class GeneralInfoPatient extends Model
{
    protected $table = 'general_info_patients';

    protected $guarded = [];

}
