<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class activityPay extends Model
{
    protected $table = 'activity_pay';

     protected $fillable = [
        'activity_id',
        'student_id',
        'order_id',
        'user_id',
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
        'program',
        'date',
        'fees',
        'age',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }


    public function activity()
    {
        return $this->belongsTo(Event::class, 'activity_id', 'id');
        //  return $this->belongsTo(Activity::class, 'activity_id');
    }
}
