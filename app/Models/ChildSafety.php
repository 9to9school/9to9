<?php
// app/Models/ChildSafety.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChildSafety extends Model
{
    protected $fillable = ['title', 'description', 'image', 'status'];
}
