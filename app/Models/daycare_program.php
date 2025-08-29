<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class daycare_program extends Model
{
    protected $fillable = [
        'page',
        'image',
        'heading',
        'description',
        'sub_heading',
        'key1',
        'key2',
        'key3',
        'key4',
        'status',
    ];
}
