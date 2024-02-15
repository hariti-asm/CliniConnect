<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\User;

class FavoritesController extends Controller
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
        $request->validate([
            'doctor_id' => 'required|exists:users,id',
        ]);
        $patientId = auth()->user()->id;
        $favorite = new Favorite();
        $favorite->patient_id = $patientId;
        $favorite->doctor_id = $request->doctor_id;
        $favorite->save();

        return redirect()->back()->with('success', 'added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = User::findOrFail($id);

        $preferredDoctors = $patient->favoriteDoctors()->with('doctor')->get();
    
        return view('favorites', compact('patient', 'preferredDoctors'));
    }
    public function getFavorites($id)
    {
        $patient = User::findOrFail($id);

        $preferredDoctors = $patient->favoriteDoctors()->with('doctor')->get();
    
        return view('favorites', compact('patient', 'preferredDoctors'));
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
    public function destroy(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:favorites,doctor_id',
        ]);

        $userId = auth()->id();
        $doctorId = $request->doctor_id;

        Favorite::where('patient_id', $userId)
            ->where('doctor_id', $doctorId)
            ->delete();

        return redirect()->back()->with('success', 'Doctor removed from favorites successfully.');
    }

    }

