<?php

namespace App\Modules\Recover\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recover extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \App\Modules\Recover\Database\factories\RecoverFactory::new();
    }
}
