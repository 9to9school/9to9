<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'packages';

     protected $fillable = ['title', 'url','image', 'banner_image','banner_heading', 'description','per_month_fee','annual_fee','discount_fee'];
     public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
