<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speciality;
use App\Models\Illness; 
use App\Models\User; // Assuming you have an Illness model


use Illuminate\Support\Facades\Auth;

class SpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function getSpecialities(){
        $specialities = Speciality::all();
        $doctors = User::where('user_type', 2)->paginate(6);
        return view('welcome', compact('specialities', 'doctors'));
    }
    
    public function index()
    {    
        $doctor = Auth::user();

        $doctorSpecialtyId = $doctor->speciality_id;

        $illnesses = Illness::where('speciality_id', $doctorSpecialtyId)->get();

        if ($doctorSpecialtyId) {
            $specialties = Speciality::where('id', $doctorSpecialtyId )->get();

            return view('specialties.index', compact('specialties', 'illnesses'));
        } else {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Display the form for creating a new Speciality (if needed)
        // return view('specialties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $Speciality = new Speciality();
        $Speciality->name = $validatedData['name'];

        $Speciality->save();
        return redirect()->route('admin.index')->with('success', 'Speciality added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Retrieve the Speciality to be edited
        $Speciality = Speciality::findOrFail($id);

        // Display the form for editing the Speciality
        return view('specialities.edit', compact('Speciality'));
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
        // Retrieve the Speciality to be updated
        $Speciality = Speciality::findOrFail($id);

        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $Speciality->update($validatedData);

        return redirect()->route('admin.index')->with('success', 'Speciality updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Retrieve the Speciality to be deleted
        $Speciality = Speciality::findOrFail($id);

        // Delete the Speciality
        $Speciality->delete();

        // Redirect back to the specialties index page with a success message
        return redirect()->route('admin.index')->with('success', 'Speciality deleted successfully.');
    }
}
