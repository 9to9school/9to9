<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LifeSkillsHack extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'image',
        'description',
        'banner_image',
        'banner_heading',
        'banner_description',
        'status'
    ];
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}