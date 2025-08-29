<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kit extends Model
{
   protected $fillable = ['title', 'image', 'products', 'desc',  'final_price'];

    public function getProductsListAttribute()
    {
        $raw = $this->attributes['products'] ?? null;

        if (!$raw) {
            return collect(); 
        }

    
        $ids = json_decode($raw, true);

        if (!is_array($ids)) {
            return collect(); 
        }

        return Product::whereIn('id', $ids)->get();
    }
}
