<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'customer_name',
        'customer_surname',
        'customer_email',
        'customer_phone',
        'appointment_time'
    ];
    use HasFactory;
}
