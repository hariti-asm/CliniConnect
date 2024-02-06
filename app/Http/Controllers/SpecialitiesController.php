<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speciality;
class SpecialitiesController extends Controller
{
    public function getSpecialities(){
        $specialities=Speciality::all();
        return view('welcome',['specialities'=>$specialities]);
    }
}
