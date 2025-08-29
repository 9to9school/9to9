<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildLearning extends Model
{
    use HasFactory;

    // Specify the table name if it differs from the plural form of the model name
    protected $table = 'child_learning_applications';

    // Define which columns are mass assignable
    protected $fillable = [
        'heading',
        'description',
        'image',
        'app_image1',
        'app_link1',
        'app_image2',
        'app_link2',
        'status',
    ];
public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    // Define any date columns
    protected $dates = ['created_at', 'updated_at'];
}