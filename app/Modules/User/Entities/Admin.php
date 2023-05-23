<?php

namespace App\Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $id_user
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Admin extends Model
{
    protected $table = 'admins';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
