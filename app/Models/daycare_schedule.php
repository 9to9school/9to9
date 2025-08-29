<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class daycare_schedule extends Model
{
    protected $fillable = [
        'heading',
        'timing',
        'description',
        'image',
        'status',
    ];
}
