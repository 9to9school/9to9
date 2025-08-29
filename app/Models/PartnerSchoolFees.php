<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerSchoolFees extends Model
{
    protected $fillable = ['age', 'partner_school_id', 'per_month_fees', 'annual_fees', 'status'];
}
