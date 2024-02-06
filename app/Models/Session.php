<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $fillable = [
        'doctor_id',
        'patient_id',
        'date',
        'start_time',
        'end_time',
        'status',
    ];

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id')->where('user_type', 1); // Filter patients
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id')->where('user_type', 2); // Filter doctors
    }
}
