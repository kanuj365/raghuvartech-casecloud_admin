<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'gst_no',
        'status',
        'no_of_licenses',
        'expertise',
        'validity',
        'payment_mode',
        'payment_details',
        'address',
    ];
    
    
}

