<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lifehackDetails extends Model
{
    protected $table = 'life_hack_details';

    protected $fillable = [
        'title',
        'url',
        'image',
        'description',
        'banner_image',
        'banner_heading',
        'banner_description',
        'status',
        'life_hack_id'
    ];
}
