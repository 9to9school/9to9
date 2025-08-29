<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demo extends Model
{
    protected $fillable = [
    'parent_name',
    'mobile_number',
    'child_name',
    'age',
    'time',
];
}
