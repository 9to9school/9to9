<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class daycare_whychoose extends Model
{
    protected $fillable = [
        'heading',
        'description',
        'image',
        'status',
    ];
}
