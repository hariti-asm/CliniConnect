<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'prescription', 'dosage','illness_id'];

    /**
     * Define the relationship between Medication and Illness.
     */
    public function illness()
    {
        return $this->belongsTo(Illness::class);
    }
}
