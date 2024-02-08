<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Speciality;
use App\Models\User;

class SpecialitiesController extends Controller
{
    public function getSpecialities(){
        $specialities = Speciality::all();
        $doctors = User::where('user_type', 2)->paginate(6);
        // foreach ($doctors as $doctor) {
        //     $averageRating = $doctor->reviews()->avg('rating');
        //     $doctor->averageRating = $averageRating;
        // }
        return view('welcome', compact('specialities', 'doctors'));
    }
    
  
}
