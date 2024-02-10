<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', // Title of the certificate
        'description', // Description of the certificate
        'date_received', // Date when the certificate was received
        'issuer', // Entity that issued the certificate
        'expiration_date',
        'patient_id',
        'doctor_id'
    ];
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
    
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id')->where('user_type', 2); // Filter doctors
    }
}
