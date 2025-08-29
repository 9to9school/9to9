<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class masterPayment extends Model
{
    protected $fillable = [
        'student_id',
        'parent_id',
        'school_id',
        'order_id',
        'total',
        'source',
        'purpose',
    ];
}
