<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use App\Models\Session;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function doctor_detail($id)
    {
        $sessions = Session::where('doctor_id', $id)->get();
        $doctor = User::where('user_type', 2)->where('id', $id)->first();
    
        // Fetch reviews for the doctor
        $reviews = $doctor->reviews;
        $morning_sessions = [];
        $afternoon_sessions = [];
    
        foreach ($sessions as $session) {
            $start_time = \Carbon\Carbon::parse($session->start_time);
            // Separate sessions by day and time
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
            // Validate the incoming request data
            $validatedData = $request->validate([
                'comment' => 'required|string',
                'rating' => 'required|integer',
            ]);
        
            // Create a new review instance
            $review = new Review();
        
            // Assign the validated data to the review attributes
            $review->comment = $validatedData['comment'];
            $review->rating = $validatedData['rating'];
        
            // You might want to associate the review with a user if applicable
            // For example, if you have a User model and the reviews table has a user_id foreign key
            $review->patient_id = auth()->user()->id;
        
            // Assuming you're passing the doctor ID as a parameter in the form action
            // You can retrieve it from the request or directly from the URL
            // For example, if the doctor ID is passed as a route parameter, you can get it like this:
            // $doctorId = $request->route('id');
            // However, if you're passing it directly in the form action as a query parameter or input field, you can get it like this:
            // $doctorId = $request->input('doctor_id');
            // Make sure to adjust this based on how you're passing the doctor ID
        
            // For demonstration purposes, assuming the doctor ID is passed as a route parameter
            $doctorId = $request->route('id');
            $review->doctor_id = $doctorId;
        
            // Save the review to the database
            $review->save();
        
            // Redirect back or return a response
            return redirect()->back()->with('success', 'Review submitted successfully!');
        }
        
}
