<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplyLeave extends Model
{
    protected $fillable = [
        'teacher_id',
        'date_end',
        'date_start',
        'school_id',
        'type',
        'reason',
    ];


    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}
