<?php

namespace App\Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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


}
