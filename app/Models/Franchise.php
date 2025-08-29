<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Franchise extends Model
{
    use HasFactory;

    protected $fillable = [
        'banner_image',
        'banner_heading',
        'banner_para',
        'btn_name',
        'btn_link',

        'why_choose_heading',
        'why_choose_para',

        'requirement_heading',
        'requirement_para',
        'requirement_image1',
        'requirement_title1',
        'requirement_image2',
        'requirement_title2',

        'investment_heading',
        'investment_para',
        'investment_image',

        'steps_heading',
        'steps_para',
        'step1',
        'step2',
        'step3',
        'step4',

        'location_heading',
        'location_para',

        'blog_heading',
        'blog_para',

        'get_start_heading',
        'get_start_para',
        'get_start_btn_name',
        'get_start_link',

        'status',
    ];
}
