<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherApplication extends Model
{
     protected $fillable = ['fullname', 'email','phone_number','state','city','pin_code' ,'resume','experience','qualification','source','vacancy_id'];
}
