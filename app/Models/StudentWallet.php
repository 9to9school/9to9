<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentWallet extends Model
{
    protected $table = 'student_wallet'; 

    protected $fillable = [
        'student_id',
        'school_id',
        'ladger_status',
        'student_coins',
        'payment_date',
        'status',
        'source','parent_id','purpose'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(User::class, 'parnet_id', 'id');
    }

    
}
