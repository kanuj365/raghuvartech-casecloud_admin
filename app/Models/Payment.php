<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id', 'payment_method', 'status', 'amount', 'currency', 'transaction_id', 'payment_mode'
    ];
}

