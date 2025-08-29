<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'student_id',
        'school_id',
        'teacher_id',
        'date',
        'status',
        'note',
        'shift',
        'role','coordinator_id'
    ];


    public function students()
    {
        return $this->belongsTo(Student::class,'student_id','id');
    }
}
