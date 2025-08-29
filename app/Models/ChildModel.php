<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildModel extends Model
{

    use HasFactory;

    protected $table = 'child';

    protected $fillable = [
    'student_id',
    'gender',
    'first_name',
    'last_name',
    'age',
    'per_month_fee',
    'discount_fee',
    'annual_fee',

];
    
    
}