<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    use HasFactory;
    
    protected $fillable = [
        'heading',
        'image',
        'description',
        'button_name',
        'button_link',
        'status',
        'short_summary',
        'meta_type',
    ];
}
