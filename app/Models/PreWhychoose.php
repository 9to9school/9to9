<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreWhychoose extends Model
{
    protected $fillable = [
        'heading',
        'description',
        'image',
        'title',
        'paragraph',
        'title2',
        'paragraph2',
        'title3',
        'paragraph3',
        'title4',
        'paragraph4',
        'status',
    ];
}
