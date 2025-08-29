<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaycareRegister extends Model
{
    protected $fillable = [
        'name',
        'price',
        'hour',
        'type',
    ];
}
