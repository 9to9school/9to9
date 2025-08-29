<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreSchoolRegistration extends Model
{
    protected $table = 'pre_school_registrations';
     protected $fillable = [
        'parent_name',
        'phone_number',
        'child_age',
    ];
}
