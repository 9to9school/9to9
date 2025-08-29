<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreExplore extends Model
{
    protected $fillable = [
        'heading',
        'sub_heading',
        'image',
        'description',
        'button_name',
        'button_link',
        'status',
    ];
}
