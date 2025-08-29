<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Schoolfacility;
use App\Models\SchoolBanner;
use App\Models\SchoolAboutus;
use App\Models\SchoolGallery;

class School extends Model
{
    protected $table = 'schools'; // optional if table name matches plural of model
    protected $primaryKey = 'id'; // default, so can be omitted

    protected $fillable = [
        'user_id', 'school_name', 'school_logo', 'school_email',
        'school_phone_1', 'school_phone_2', 'principal_name',
        'vice_principal_name', 'address', 'city', 'state',
        'zip', 'document', 'image','age','fees_price',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function schoolFacility()
    {
        return $this->hasMany(Schoolfacility::class);
    }

    public function schoolBanner()
    {
        return $this->hasOne(SchoolBanner::class);
    }

    public function schoolAboutus()
    {
        return $this->hasOne(SchoolAboutus::class);
    }

    public function schoolGallery()
    {
        return $this->hasMany(SchoolGallery::class);
    }
}
