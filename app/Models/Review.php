<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_id', 'doctor_id', 'rating', 'comment'
    ];

    // Define relationship with Patient (User)
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id')->where('user_type', 1); // Filter patients
    }

    // Define relationship with Doctor (User)
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id')->where('user_type', 2); // Filter doctors
    }
}
