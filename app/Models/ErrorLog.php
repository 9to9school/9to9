<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ErrorLog extends Model
{
    protected $fillable = ['table_name', 'error_message'];
}
