<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyWeStandApart extends Model
{
    use HasFactory;

    protected $table = "why_we_stand_aparts";

    protected  $fillable = ['title', 'url', 'image','banner_image', 'description', 'banner_heading', 'banner_description'];

}