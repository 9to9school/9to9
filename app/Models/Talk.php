<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Talk extends Model
{
    protected $table = 'expert_consultations';
    protected $fillable = ['full_name', 'email','mobile_number','calling_number','whatsapp_number', 'preferred_time','question_or_concern'];
}
