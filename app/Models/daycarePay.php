<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class daycarePay extends Model
{
    
     protected $fillable = [
        'daycare_id',
        'student_id',
        'order_id',
        'parent_id',
        'school_id',
        'pincode',
        'name',
        'address',
        'email',
        'city',
        'phone',
        'status',
        'source',
        'date',
        'fees',
        'type',
        'hours'
    ];

     public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }


    public function daycare()
    {
        return $this->belongsTo(DaycareRegister::class, 'daycare_id', 'id');

    }
}
