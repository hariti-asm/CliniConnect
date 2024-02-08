<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Session;

class DoctorController extends Controller
{
    public function doctor_detail($id)
    {
        $sessions = Session::where('doctor_id', $id)->get();
        $doctor = User::where('user_type', 2)->where('id', $id)->first();

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

        return view('doctor_detail', compact('morning_sessions', 'afternoon_sessions', 'doctor','sessions'));
    }
    public function book(Session $session)
    {
        if ($session->status === 'available') {
            $session->update(['status' => 'taken']);
    
    
            return redirect()->back()->with('success', 'Appointment booked successfully.');
        } else {
            return redirect()->back()->with('error', 'The appointment is no longer available.');
        }}
}
