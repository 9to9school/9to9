<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreGallery extends Model
{
    protected $fillable = [
        'page',
        'image',
        'alt_text',
        'status',
    ];
}
