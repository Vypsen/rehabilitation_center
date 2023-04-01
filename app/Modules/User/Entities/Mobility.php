<?php

namespace App\Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Modules\User\Entities\Mobility
 *
 * @property int $id
 * @property int $id_user
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
 * @method static \App\Modules\User\Database\factories\MobilityFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Mobility newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mobility newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mobility query()
 * @method static \Illuminate\Database\Eloquent\Builder|Mobility whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mobility whereGetUpSitsDown($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mobility whereGetsUp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mobility whereHelpsWalkingRoom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mobility whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mobility whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mobility whereLadder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mobility whereLyingTurn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mobility whereRaiseItem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mobility whereRunning($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mobility whereSits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mobility whereSitsDown($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mobility whereStairwell($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mobility whereToStand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mobility whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mobility whereWalkingRoom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mobility whereWalkingStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mobility whereWalksGravel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mobility whereWashes($value)
 * @mixin \Eloquent
 */
class Mobility extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = ['sdate' => 'datetime:Y.m.d'];

    protected $table = 'patient_mobility';

    public function getUser()
    {
        return $this->belongsTo(User::class);
    }

    protected static function newFactory()
    {
        return \App\Modules\User\Database\factories\MobilityFactory::new();
    }


}
