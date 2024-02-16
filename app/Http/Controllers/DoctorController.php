<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\illness;
use Illuminate\Support\Facades\Auth;
class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    //  use App\Models\Medication;

    public function show()
    {        
        $doctor = Auth::user();
        $specialityId = $doctor->speciality->id;
        $sessions = Session::where('doctor_id', $doctor->id)->get();
        $patients = $doctor->patients;
    
        $patientIllnesses = [];
        foreach ($patients as $patient) {
            $patientSpecialityId = $patient->speciality->id;
            // Check if the patient's speciality matches the doctor's speciality
            if ($specialityId === $patientSpecialityId) {
                $illnesses = Illness::where('speciality_id', $patientSpecialityId)->get();
                foreach ($illnesses as $illness) {
                    // Retrieve medications for each illness
                    $medications = $illness->medications;
                    // Store medications in the patientIllnesses array
                    $patientIllnesses[$patient->id][$illness->name] = $medications;
                }
            }
        }
    
        if ($doctor->user_type !== 2) {
            return redirect()->route('filter_doctors');
        }
    
        // Pass all the necessary data to the view
        return view('doctors.show', compact('doctor', 'patients', 'sessions', 'patientIllnesses'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
