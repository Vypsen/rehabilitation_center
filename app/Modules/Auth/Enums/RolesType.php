<?php

namespace App\Modules\Auth\Enums;

use App\Enums\AbstractEnum;

class RolesType extends AbstractEnum
{
    public const ADMIN = 0;
    public const DOCTOR = 1;
    public const PATIENT = 2;

}
