<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SubTopic;


class AddProgress extends Model
{
    protected $fillable = [
        'school_id',
        'teacher_id',
        'student_id',
        'topic',
        'sub_topic',
        'percent',
        'status',
        'date_start',
        'date_end',
    ];

    public function topicDetail()
    {
        return $this->belongsTo(Topic::class, 'topic', 'id');
    }

    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    // Optional: if you're using student/teacher
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
    public function topic()
    {
        return $this->belongsTo(\App\Models\Topic::class, 'topic');
    }

    public function getSubTopicNamesAttribute()
    {
        $ids = json_decode($this->sub_topic ?? '[]');
        return SubTopic::whereIn('id', $ids)->pluck('name')->toArray();
    }
}
