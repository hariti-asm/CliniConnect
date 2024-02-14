<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Models\Speciality;
use App\Models\Illness; 
use App\Models\User; 

use Illuminate\Support\Facades\DB;



use Illuminate\Support\Facades\Auth;

class SpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

  
     public function getSpecialities(Request $request)
     {

        $patient_id=Auth::user()->id;
        $fn=Favorite::where('patient_id',$patient_id)->count();
         $specialities = Speciality::all();
         $specialityId = $request->input('speciality');
         if ($specialityId) {
             $doctors = User::where('user_type', 2)
                             ->whereHas('speciality', function ($query) use ($specialityId) {
                                 $query->where('id', $specialityId);
                             })
                             ->with(['reviews' => function ($query) {
                                 $query->select('doctor_id', DB::raw('avg(rating) as average_rating'))
                                       ->groupBy('doctor_id');
                             }])
                             ->paginate(6);
     
             // Calculate average rating for each doctor
             foreach ($doctors as $doctor) {
                 $doctor->averageRating = $doctor->reviews->first()->average_rating ?? 0;
             }
         } else {
             $doctors = User::where('user_type', 2)
                            ->with(['reviews' => function ($query) {
                                 $query->select('doctor_id', 
                                 
                                 DB::raw('avg(rating) as average_rating'))
                                       ->groupBy('doctor_id');
                             }])
                            ->paginate(6);
     
             // Calculate average rating for each doctor
             foreach ($doctors as $doctor) {
                 $doctor->averageRating = $doctor->reviews->first()->average_rating ?? 0;
             }
         }
     
         return view('welcome', compact('specialities', 'doctors','fn'));
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
        $Speciality = Speciality::findOrFail($id);

        $Speciality->delete();

        return redirect()->route('admin.index')->with('success', 'Speciality deleted successfully.');
    }
}
