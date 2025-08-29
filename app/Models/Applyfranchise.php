<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Applyfranchise extends Model
{
    protected $table = 'apply_franchise'; 
    protected $fillable = [
        'full_name',
        'email',
        'phone_number',
        'city_state',
        'preferred_location ',
        'investment_capacity',
        'business_background ',
        'comments'
    ];
}
