<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\School;


class AddRemark extends Model
{
    protected $fillable = [
        'school_id',
        'teacher_id',
        'student_id',
        'remark',
        'remark_note',
        'image',
        'date',
        'topic_id',
        'subtopic_id'
    ];

   public function school() {
    return $this->belongsTo(School::class, 'school_id');
}


public function teacher() {
    return $this->belongsTo(Teacher::class, 'teacher_id');
}

public function student() {
    return $this->belongsTo(Student::class, 'student_id');
}

public function topics() {
    return $this->belongsTo(Topic::class, 'topic_id','id');
}

}
