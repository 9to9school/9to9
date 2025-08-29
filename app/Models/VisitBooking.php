<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitBooking extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'visit_bookings';

    // Specify the primary key (if different from 'id')
    protected $primaryKey = 'id';

    // Allow mass assignment for these fields
    protected $fillable = [
        'title',
        'description',
        'btn_name',
        'btn_link',
        'status'
    ];
public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    // Disable timestamps if not using created_at and updated_at
    public $timestamps = true;
}
