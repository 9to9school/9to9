<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class daycare_activites extends Model
{
    protected $fillable = [
        'heading',
        'description',
        'image',
        'status',
    ];
}
