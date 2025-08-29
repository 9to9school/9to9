<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KitOrder extends Model
{
   // App\Models\KitOrder.php
protected $fillable = [
    'order_id',
    'user_id',
    'student_id',
    'parent_id',
    'school_id',
    'source',
    'payment_date',
    'kit_id',
    'name',
    'address',
    'city',
    'state',
    'pincode',
    'phone',
    'item_price',
    'delivery_charge',
    'total',
    'status',
    'email',
    'type'
];

public function kit()
{
    return $this->belongsTo(Kit::class, 'kit_id', 'id');
}


public function student()
{
    return $this->belongsTo(Student::class, 'student_id', 'id');
}


public function school()
{
    return $this->belongsTo(School::class, 'school_id', 'id');
}

}
