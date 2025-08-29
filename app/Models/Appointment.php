<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'full_name',
        'mobile_number',
        'child_age_group',
        'state',
        'city',
        'appointment_mode',
        'preferred_date',
        'preferred_time_slot',
        'notes',
    ];
}
