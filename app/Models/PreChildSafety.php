<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreChildSafety extends Model
{
    protected $fillable = [
        'heading',
        'description',
        'color',
        'image',
        'status',
    ];
}
