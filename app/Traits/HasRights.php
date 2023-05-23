<?php

namespace App\Traits;

trait HasRights
{
    public function rights()
    {
        return $this->belongsToMany(Permission::class, 'users_permissions');
    }
}
