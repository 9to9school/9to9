<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecializedClass extends Model
{
    protected $fillable = [
    'class_name',
    'class_url',
    'image',
    'banner_image',
    'description',
    'banner_heading',
    'banner_description',
    'sub_heading',
    'duration',
    'age',
    'no_of_student',
    'no_of_teacher',
    'fees',
    'materials',
    'skills',
    'status',
];
}
