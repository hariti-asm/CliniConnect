<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\illness;
class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'description',
        'date_received', 
        'issuer', 
        'expiration_date',
        'patient_id',
        'doctor_id',
        'ilness_id',
        'status'
    ];
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
    
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id')->where('user_type', 2); // Filter doctors
    }
    public function illeness()
    {
        return $this->belongsTo(illness::class, 'id'); 
    }
}
