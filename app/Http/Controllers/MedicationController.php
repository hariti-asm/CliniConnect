<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medication;
use App\Models\illness;

use Illuminate\Support\Facades\Auth;

class MedicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    $doctor = Auth::user();

        $doctorSpecialtyId = auth()->user()->speciality_id;
       $illnesses=illness::where('speciality_id',$doctorSpecialtyId );
        if ($doctorSpecialtyId) {
            $medications = Medication::whereHas('illness', function ($query) use ($doctorSpecialtyId) {
                $query->whereNotNull('speciality_id')
                      ->where('speciality_id', $doctorSpecialtyId);
            })->get();
    
            return view('medications.index', compact('medications','illnesses','doctor'));
        } else {
           echo"something goes wrong";
        }
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|string',
            'description' => 'nullable|string',
            'dosage' => 'nullable|string',
        ]);

        // Create a new medication instance with the validated data
        $medication = new Medication();
        $medication->name = $validatedData['name'];
        $medication->description = $validatedData['description'];
        $medication->dosage = $validatedData['dosage'];

        // Save the medication to the database
        $medication->save();

        // Redirect back to the page with a success message
        return redirect()->back()->with('success', 'Medication added successfully.');
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
    public function update(Request $request, Medication $medication)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'dosage' => 'nullable|string|max:255',
        ]);
    
        $medication->update($validatedData);
    
        return redirect()->route('medications.index')->with('success', 'Medication updated successfully');
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
    
        return redirect()->route('medications.index')->with('success', 'Medication deleted successfully');
    }
}
