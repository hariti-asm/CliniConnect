<?php

namespace App\Http\Controllers;

use App\Models\illness;
use App\Models\Medication;
use App\Models\Review;
use App\Models\User;
use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      

        $patients=User::all()->where('user_type',1);
        $specialities=Speciality::all();
        $specialitiesNumber=Speciality::count();
        $patientsNumber = User::where('user_type', 1)->count();
        $doctorsNumber = User::where('user_type', 2)->count();
        $doctors=User::all()->where('user_type',2);
        $doctor = Auth::user();

        return view('admin.index', compact('patients', 'specialities', 'doctorsNumber','patientsNumber','specialitiesNumber','doctors','doctor'));

    }

    public function  getPatients()
    {
        $patients=User::all()->where('user_type',1);
        $specialities=Speciality::all();
        $specialitiesNumber=Speciality::count();
        $patientsNumber = User::where('user_type', 1)->count();
        $doctorsNumber = User::where('user_type', 2)->count();
        $doctor = Auth::user();

        return view('admin.patients', compact('patients', 'specialities', 'doctorsNumber','patientsNumber','specialitiesNumber','doctor'));

    }
    public function getMedications(){
        $doctor = Auth::user();

        $medications=Medication::all();
        $illnesses=illness::all();
        return view('admin.medications',compact('medications','doctor','illnesses'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
     {              $doctor = Auth::user();

           $reviews=Review::all();
        return view('admin.messages',compact('reviews','doctor'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'medicine_name' => 'required|string|max:255',
            'medicine_description' => 'required|string|max:255',
           'illeness_id'=>'required|integer'
        ]);

        $medicine = new Medication();
        $medicine->name = $validatedData['medicine_name'];
        $medicine->description = $validatedData['medicine_description'];
        $medicine->illness_id = $validatedData['illeness_id'];

        $medicine->save();
        return redirect()->back()->with('success', 'Medicine added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $speciality = Speciality::findOrFail($id);
    
        $speciality->status = 'archived';
    
        $speciality->save();
    
        return redirect()->back()->with('success', 'Speciality added successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medication $medication)
    {
        $medication->delete();
    
        return redirect()->route('admin/medications')->with('success', 'Medication deleted successfully');
    }
}
