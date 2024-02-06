<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_id', 'doctor_id'
    ];
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id')->where('user_type', 1);
    }

    // Define relationship with Doctor (User)
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id')->where('user_type', 2);
    }
}
