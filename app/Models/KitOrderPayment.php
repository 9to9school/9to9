<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KitOrderPayment extends Model
{
    protected $fillable = [
    'kit_order_id',
    'transaction_id',
    'payment_method',
    'payment_status',
    'paid_at',
];     }
