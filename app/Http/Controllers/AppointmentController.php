<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;

class AppointmentController extends Controller
{
    public function book(Session $session)
    {
        if ($session->status === 'available') {
            $session->update(['status' => 'taken']);
    
            return redirect()->back()->with('success', 'Appointment booked successfully.');
        } else {
            return redirect()->back()->with('error', 'The appointment is no longer available.');
        }}
}
