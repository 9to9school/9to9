<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnquiryPartnerSchool extends Model
{
     protected $fillable = [
        'partner_school_id',
        'full_name',
        'email',
        'mobile_number',
        'que_of_concern',
    ];


    public function school()
    {
        return $this->belongsTo(partnerSchool::class, 'partner_school_id','id');
    }
}
