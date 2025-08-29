<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OurProgram extends Model
{
    protected $fillable = [
    'heading',
    'short_description',
    'long_description',
    'image',
    'time_from',
    'time_to',
    'fees',
    'week',
    'student',
    'age_group',
    'status',
    'high_lights',
    'tags'
];

}
