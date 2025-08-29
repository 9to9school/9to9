<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Otp extends Model
{
    use HasFactory;

    protected $fillable = ['userid', 'phone_number', 'otp', 'status'];

    public function user() {
        return $this->belongsTo(User::class, 'userid');
    }
}