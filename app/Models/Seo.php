<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
protected $table = 'tbl_seos'; 
protected $fillable = [
        'url', 'title', 'description', 'keyword', 'image', 'status'
    ];
}
