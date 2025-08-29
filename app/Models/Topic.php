<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Popular;

class Topic extends Model
{
    protected $table = 'topics_including';
     protected $fillable = [
        'topic_name',
        'image',
        'description',
        'age'
       
    ];


    public function   popular()
    {
        return $this->belongsTo(Popular::class, 'age', 'id');
    }

}
