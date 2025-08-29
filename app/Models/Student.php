<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Student extends Model
{
    protected $fillable = [
    'academic_year',
    'admission_number',
    'school_id',
    'admission_date',   
    'first_name',
    'last_name',
    'primary_contact',
    'mother_tongue',
    'gender',    
    'father_name',
    'email',
    'phone_number_1',
    'phone_number_2',
    'address',
    'city',
    'state',
    'zip',
    'medical_condition',
    'allergies',
    'medications',
    'student_image', // ← Add this line
    'mother_name',
    'religion',
    'nationality',
    'per_month_fee',
    'discount_fee',
    'annual_fee',
    'age',
    'user_id',
    'student_id',
    'time_shift',
    'language_known',
    'father_occup','mother_occup','topic','subtopic','good_habit','bad_habit','father_image','mother_image','birth_cert','tranc_cert','medical_image','description','misc1','misc2'
];

public function user()
{
    return $this->belongsTo(User::class);
}

public function school()
{
    return $this->belongsTo(School::class, 'school_id', 'id');
}

public function shifts()
{
    return $this->belongsTo(Shift::class, 'time_shift', 'id');
}


public function ages()
{
    return $this->belongsTo(Popular::class, 'age', 'id');
}

public function attendances()
{
    return $this->hasMany(Attendance::class, 'student_id', 'id');
}

}
