<?php

namespace App\Modules\Doctor\Entities;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int $id
 * @property int $scale_id
 * @property string $name
 * @property int $score
 * @property string $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class ScalesQuestions extends Authenticatable implements MustVerifyEmail
{
    protected $table = 'scales_questions';


}
