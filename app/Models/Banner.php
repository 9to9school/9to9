<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'heading', 'image', 'description', 'button_name', 'button_link', 'status'
    ];
}