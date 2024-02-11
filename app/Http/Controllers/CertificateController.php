<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Session;
use App\Models\illness;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    // public function show(Certificate $certificate)
    public function show($id)
    {
        $doctor = User::findOrFail($id);
    
        // Fetch the doctor's specialty
        $specialtyId = $doctor->speciality_id;
    
        // Fetch illnesses related to the doctor's specialty
        $illnesses = Illness::where('speciality_id', $specialtyId)->get();
    
        $patients = Session::where('doctor_id', $doctor->id)
                        ->whereNotNull('patient_id')
                        ->with('patient')
                        ->get();
    
        return view('certificates.show', compact('patients', 'doctor', 'illnesses'));
    }
    
        
        
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificate $certificate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificate $certificate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificate $certificate)
    {
        //
    }
}
