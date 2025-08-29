<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolCategory extends Model
{

    protected  $table = "school_category";

    protected $fillable = [
        'image', 'category_name', 'category_url','banner_image', 'content', 'status'
    ];
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
