<?php

namespace App\Modules\Patient\Entities;

use App\Modules\User\Entities\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $patient_id
 * @property bool $lying_turn
 * @property bool $sits_down
 * @property bool $sits
 * @property bool $gets_up
 * @property bool $to_stand
 * @property bool $get_up_sits_down
 * @property bool $helps_walking_room
 * @property bool $stairwell
 * @property bool $walking_street
 * @property bool $walking_room
 * @property bool $raise_item
 * @property bool $walks_gravel
 * @property bool $washes
 * @property bool $ladder
 * @property bool $running
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Skills extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = ['created_at' => 'datetime:Y-m-d'];

    protected $table = 'patient_skills';

    public function patient()
    {
    }
}
