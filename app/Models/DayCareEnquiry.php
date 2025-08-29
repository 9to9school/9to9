<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DayCareEnquiry extends Model
{
       protected $table = 'day_care_enquiries';
    protected $fillable = [
            'full_name',
            'email',
            'phone_number',
            'state',
            'city',
            'message',
            'page',
        ];
}
