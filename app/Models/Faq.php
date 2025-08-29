<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
   

    protected $fillable = ['name', 'category_id', 'description', 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}