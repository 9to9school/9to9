<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreferredTime extends Model
{
    protected $fillable = [
        'student_id',
        'parent_id',
        'school_id',
        'preferred_time',
        'date_from',
        'date_to',
        'status',
    ];
}
