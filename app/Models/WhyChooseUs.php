<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyChooseUs extends Model
{
    protected $fillable = [
        'heading',
        'content',
        'box_heading1',
        'box_content1',
        'box_heading2',
        'box_content2',
        'box_heading3',
        'box_content3',
        'box_heading4',
        'box_content4',
        'image',
        'status',
    ];
}
