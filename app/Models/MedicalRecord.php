<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    protected $fillable = [
        'patient_id', 'doctor_id', 'diagnosis', 'prescription', 'certificate_id'
    ];

    // Define relationships
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id')->where('user_type', 1); // Filter patients
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id')->where('user_type', 2); // Filter doctors
    }

    public function prescriptionMedication()
    {
        return $this->belongsTo(Medication::class, 'prescription');
    }

    // public function certificate()
    // {
    //     return $this->belongsTo(Certificate::class);
    // }
}
