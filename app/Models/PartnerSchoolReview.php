<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerSchoolReview extends Model
{
    protected $fillable = [
        'partner_school_id',
        'user_id',
        'rating',
        'review','image','name'
    ];

    public function partnerSchool()
    {
        return $this->belongsTo(PartnerSchool::class,'partner_school_id','id');
    }

    
}
