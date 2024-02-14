<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Review;
use App\Models\Session;
use App\Models\Certificate;

use Illuminate\Http\Request;

class patientController extends Controller
{
    public function doctor_detail($id)
    { 
        $sessions = Session::where('doctor_id', $id)->get();
        $doctor = User::where('user_type', 2)->where('id', $id)->first();
    
        $reviews = $doctor->reviews;
        $morning_sessions = [];
        $afternoon_sessions = [];
    
        foreach ($sessions as $session) {
            $start_time = \Carbon\Carbon::parse($session->start_time);
            if ($start_time->hour >= 8 && $start_time->hour < 13) {
                if (!isset($morning_sessions[$session->date])) {
                    $morning_sessions[$session->date] = [];
                }
                $morning_sessions[$session->date][] = $session;
            } else {
                if (!isset($afternoon_sessions[$session->date])) {
                    $afternoon_sessions[$session->date] = [];
                }
                $afternoon_sessions[$session->date][] = $session;
            }
        }
    
        return view('doctor_detail', compact('morning_sessions', 'afternoon_sessions', 'doctor', 'sessions', 'reviews'));
    }
    
    public function book(Session $session)
    {
        if ($session->status === 'available') {
            $session->update(['status' => 'taken']);
    
    
            return redirect()->back()->with('success', 'Appointment booked successfully.');
        } else {
            return redirect()->back()->with('error', 'The appointment is no longer available.');
        }}
        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'comment' => 'required|string',
                'rating' => 'required|integer',
            ]);
        
            $review = new Review();
        
            $review->comment = $validatedData['comment'];
            $review->rating = $validatedData['rating'];
            $review->patient_id = auth()->user()->id;
            $doctorId = $request->route('id');
            $review->doctor_id = $doctorId;
        
            $review->save();
        
            return redirect()->back()->with('success', 'Review submitted successfully!');
        }
 
public function show()
{        
    $doctor = Auth::user();
    $sessions = Session::where('doctor_id', $doctor->id)->get();
    $patients = Session::where('doctor_id', $doctor->id)
                       ->whereNotNull('patient_id')
                       ->with('patient')
                       ->get();

    if ($doctor->user_type !== 2) {
        return redirect()->route('admin.index');
    }

    return view('doctors.show', compact('doctor', 'patients','sessions'));
}  

public function getCertificateData(Request $request){
      $patient_id=Auth::user()->id;
        $certificates = Certificate::with('doctor')
        ->where('patient_id', $patient_id)
        ->get();
        return view('getCertificateData', compact('certificates'));
 
}
}
