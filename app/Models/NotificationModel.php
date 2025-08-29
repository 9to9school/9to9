<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificationModel extends Model
{
    protected $table = 'notifications';

    
    // Mass assignable attributes
    protected $fillable = [
        'title',
        'message',
        'image',
        'sendto',
        'reason',
        'time_from',
        'time_to',
        'recurring',
    ];

    // Casts to proper types
    protected $casts = [
        'time_from' => 'datetime',
        'time_to' => 'datetime',
        'recurring' => 'boolean',
    ];

    // If you want default values
    protected $attributes = [
        'recurring' => false,
    ];

    // Optional: accessor for image URL if stored as path
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset($this->image);
        }
        return null;
    }
}
