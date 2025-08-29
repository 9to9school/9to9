<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    protected $fillable = [
        'question',
        'option1',
        'option2',
        'option3',
        'option4',
        'image',
        'status',
    ];
}
