<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreBanner extends Model
{
    protected $fillable = [
        'page',
        'topbar',
        'heading',
        'sub_heading',
        'image',
        'description',
        'button_name1',
        'button_link1',
        'button_name2',
        'button_link2',
        'status',
    ];
}
