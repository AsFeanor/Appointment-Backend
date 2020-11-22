<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $primaryKey = 'appointment_id';
    protected $fillable = [
        'customer_name',
        'customer_surname',
        'customer_email',
        'customer_phone',
        'appointment_time_start',
        'appointment_time_end',
        'user_id',
        'title',
        'description',
        'lat',
        'lng',
        'location'
    ];

    public function users()
    {
        return $this->hasMany('App\Models\User', 'user_id', 'user_id');
    }

    use HasFactory;
}
