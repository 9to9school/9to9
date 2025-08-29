<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $fillable = [
        'event_name',
        'event_url',
        'image',
        'description',
        'status',
        'duration',
        'age',
        'banner_image',
        'banner_heading',
        'sub_heading',
        'banner_description',
        'materials',
        'skills',
        'no_of_teacher',
        'no_of_student',
        'fees',
        'program'


    ];
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
