<?php

namespace App\Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $id_user
 * @property string $post
 */
class Doctor extends Model
{
    protected $table = 'doctors';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
