<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class StudentFee extends Model
{
    protected $table = 'student_fees'; 

    protected $fillable = ['source','student_id', 'school_id','parent_id', 'order_id','per_month_fees','month','date','payment_mode','payment_status','transaction_id','reference_id','discount_amount','paid_amount','status','note','stu_academy','due_amount'];

     
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
}
