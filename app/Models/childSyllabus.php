<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class childSyllabus extends Model
{
     protected $fillable = ['school_id', 'student_id', 'age', 'topic','sub_topic','source'];
}
