<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreRegistrationBanner extends Model
{
    protected $fillable = [
        'heading',     
        'image',
        'status',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
