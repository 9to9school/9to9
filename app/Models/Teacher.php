<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Teacher extends Model
{
    protected $table = 'teachers'; 
    protected $primaryKey = 'id'; 
    protected $fillable = [
        'user_id',
        'school_id',
        'teacher_id',
        'first_name',
        'last_name',
        'class',
        'subject',
        'gender',
        'primary_contact_number1',
        'primary_contact_number2',
        'date_of_joining',
        'dob',
        'marital_status',
        'email',
        'language_known',
        'qualification',
        'work_experience',
        'previous_school1',
        'previous_school2',
        'previous_school_number',
        'address',
        'permanent_address',
        'id_number',
        'city',
        'state',
        'zip',
        'notes',
        'epf_no',
        'basic_salary',
        'contract_type',
        'work_shift',
        'date_leaving',
        'account_name',
        'account_number',
        'bank_name',
        'ifsc_code',
        'branch_name',
        'image',
        'resume',
        'letter',
        'password',
        'status',
        'skills',
        'medical_leaves',
        'casual_leaves',
        'maternity_leaves',
        'sick_leaves','is_coordinator'
    ];

    /**
     * Get the user that owns the teacher.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function schools()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class,'teacher_id','id');
    }

}