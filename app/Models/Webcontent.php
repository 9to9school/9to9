<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Webcontent extends Model
{
     protected $table = 'web_contents';

    protected $fillable = [
        'image',
        'backgroundimage',
        'subheading',
        'heading',
        'description',
        'button_name',
        'button_link',
        'btn_name',
        'btn_link',
        'status',
    ];

}
