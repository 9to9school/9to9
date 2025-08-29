<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class daycare_banner extends Model
{
    protected $fillable = [
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
