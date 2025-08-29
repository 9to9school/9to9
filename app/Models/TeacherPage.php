<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherPage extends Model
{
    use HasFactory;

    protected $table = "teacher_pages";

    protected $fillable = [
        'banner_image',
        'banner_heading',
        'banner_para',
        'btn_name',
        'btn_link',
        'why_apply_heading',
        'why_apply_para',
        'journey_heading',
        'journey_para',
        'journey_image',
        'position_heading',
        'position_para',
        'faq_heading',
        'faq_para',
        'works_heading',
        'works_para',
        'works_subheading1',
        'works_para1',
        'works_subheading2',
        'works_para2',
        'works_subheading3',
        'works_para3',
        'apply_heading',
        'apply_para',
        'apply_image',
        'description',
        'status'
    ];
}
