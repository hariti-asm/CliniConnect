<?php 
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Speciality;
use App\Models\Session;
use App\Models\User;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create 10 users using the factory
        \App\Models\User::factory(10)->create();
    
        // Seed data for specialties
        Speciality::create(['name' => 'General Health']);
        Speciality::create(['name' => 'Cardiology']);
        Speciality::create(['name' => 'Dental']);
        Speciality::create(['name' => 'Medical Research']);
    
        // Retrieve doctors
        $doctors = User::where('user_type', 2)->get();
    
        // Define the time range for sessions
        $startMorning = Carbon::createFromTime(8, 0, 0);
        $endMorning = Carbon::createFromTime(13, 0, 0);
        $startAfternoon = Carbon::createFromTime(14, 0, 0);
        $endAfternoon = Carbon::createFromTime(17, 0, 0);
    
        // Get the current day
        $currentDay = Carbon::now()->format('l');
    
        // Insert morning sessions for today
        $this->insertSessions($startMorning, $endMorning, $currentDay, $doctors);
    
        // Insert afternoon sessions for today
        $this->insertSessions($startAfternoon, $endAfternoon, $currentDay, $doctors);
    }
    

    private function insertSessions($startTime, $endTime, $day, $doctors)
    {
        // Start time for sessions
        $currentTime = $startTime;

        // Increment by 20 minutes until end time is reached
        while ($currentTime->lt($endTime)) {
            // Calculate end time for the session
            $endTimeSession = $currentTime->copy()->addMinutes(20);

            // Randomly select a doctor
            $doctor = $doctors->random();

            // Insert session into the database
            Session::create([
                'doctor_id' => $doctor->id,
                'date' => $day,
                'start_time' => $currentTime->format('H:i:s'),
                'end_time' => $endTimeSession->format('H:i:s'),
                'status' => 'available', // Assuming all sessions are initially available
            ]);

            // Move to the next session start time
            $currentTime->addMinutes(20);
        }
    }
}
