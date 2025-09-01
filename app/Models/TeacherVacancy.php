<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherVacancy extends Model
{


    protected $fillable = [
        'title',
        'school_id',
        'syllabus',
        'students',
        'shift',
        'fee',
        'openings',
        'phone',
        'whatsapp',
        'qualification',
        'experience',
        'job_description',
        'status',
    ];
}
