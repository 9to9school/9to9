<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventBook extends Model
{
     protected $table = 'book_events';
    protected $fillable = [
        'event_id',
        'event_name',
        'child_name',
        'age',
        'preferred_time',
        'preferred_date',
        'mode',
        'notes'
    ];
}
