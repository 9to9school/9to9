<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizContent extends Model
{
    use HasFactory;

    // Specify the table name if it differs from the plural form of the model name
    protected $table = 'quiz_content';

    // Define which columns are mass assignable
    protected $fillable = [
        'heading',
        'sub_heading',
        'image',
        'description',
        'btn_name',
        'btn_link',
        'status',
    ];

    // Define any date columns
    protected $dates = ['created_at', 'updated_at'];
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}