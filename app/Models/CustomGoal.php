<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomGoal extends Model
{
    protected $fillable = [
        'student_id',
        'parent_id',
        'goals_id',
    ];

   public function parent()
{
    return $this->belongsTo(User::class, 'parent_id');
}

public function student()
{
    return $this->belongsTo(Student::class, 'student_id');
}

    // Relationship with Goal model
    public function goal()
    {
        return $this->belongsTo(ProgressGoal::class, 'goals_id');
    }
}
