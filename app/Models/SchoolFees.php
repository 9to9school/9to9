<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolFees extends Model
{
    protected $fillable = ['age', 'school_id', 'per_month_fees', 'annual_fees', 'status'];
}
