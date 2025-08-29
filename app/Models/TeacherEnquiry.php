<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherEnquiry extends Model
{
protected $table = 'teacher_enquiry';

    protected $fillable = [
        'full_name', 'email', 'phone', 'age',
        'highest_qualification', 'teaching_experience', 'previous_institution',
        'subjects', 'preferred_location',
        'current_salary', 'expected_salary', 'available_from',
        'why_join', 'resume_link'
    ];
    protected $casts = [
    'subjects' => 'array',
];
}
