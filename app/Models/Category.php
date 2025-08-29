<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description', 'status'];
    protected $hidden = ['created_at', 'updated_at'];
    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}