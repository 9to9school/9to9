<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class partnerSchool extends Model
{
     protected $fillable = [
        'school_name', 'school_logo', 'school_email',
        'school_phone_1', 'school_phone_2', 'principal_name',
        'vice_principal_name', 'address', 'city', 'state',
        'zip', 'document', 'image','age','fees_price','place_id','lat','long'
    ];

    public function schoolFacility()
    {
        return $this->hasMany(Schoolfacility::class,'school_id','id');
    }

   
    public function schoolBanner()
    {
        return $this->hasOne(SchoolBanner::class,'school_id','id');
    }

    public function schoolAboutus()
    {
        return $this->hasOne(SchoolAboutus::class,'school_id','id');
    }

    public function schoolGallery()
    {
        return $this->hasMany(SchoolGallery::class,'school_id','id');
    }

    public function review()
    {
        return $this->hasMany(PartnerSchoolReview::class,'partner_school_id','id');
    }
}
