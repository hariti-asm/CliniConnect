<?php 

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Session;
use App\Models\Medication;
use App\Models\Speciality;
use App\Models\Certificate;
use Illuminate\Database\Seeder;
use App\Models\Review; // Fixed typo in model name
use App\Models\Illness; // Fixed typo in model name
use Faker\Factory as Faker; // Import the Faker class

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create 10 users using the factory
        User::factory(10)->create();

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

        // Define illnesses and medications outside of the insertSessions method
        $this->seedIllnessesAndMedications();

        // Seed certificates and reviews
        // $this->seedCertificates();
        $this->seedReviews();
    }

    private function insertSessions($startTime, $endTime, $day, $doctors)
    {
        $currentTime = $startTime;

        // Increment by 20 minutes until end time is reached
        while ($currentTime->lt($endTime)) {
            // Calculate end time for the session
            $endTimeSession = $currentTime->copy()->addMinutes(20);
            $doctor = $doctors->random();

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

    private function seedIllnessesAndMedications()
    {
        // Define illnesses and medications data
        $illnesses = [
            [
                'name' => 'Common Cold',
                'description' => 'A viral infection that affects the upper respiratory tract.',
            ],
            [
                'name' => 'Influenza (Flu)',
                'description' => 'A contagious respiratory illness caused by influenza viruses.',
            ],
            [
                'name' => 'Hypertension',
                'description' => 'High blood pressure, a common condition in which the long-term force of the blood against artery walls is high enough that it may eventually cause health problems.',
            ],
            // Add more illnesses as needed
        ];

        foreach ($illnesses as $illnessData) {
            $illness = Illness::create([
                'name' => $illnessData['name'],
                'description' => $illnessData['description'],
            ]);

            // Seed data for medications related to the illness
            $medications = $this->getMedicationsForIllness($illnessData['name']);
            foreach ($medications as $medicationData) {
                Medication::create([
                    'name' => $medicationData['name'],
                    'description' => $medicationData['description'],
                    'illness_id' => $illness->id,
                ]);
            }
        }
    }

    private function getMedicationsForIllness($illnessName)
    {
        // Define medications for each illness
        $medications = [
            'Common Cold' => [
                ['name' => 'Antihistamines', 'description' => 'Relieve symptoms such as sneezing, runny nose, and congestion.'],
                ['name' => 'Decongestants', 'description' => 'Reduce nasal congestion.'],
                ['name' => 'Pain relievers', 'description' => 'Reduce fever, headaches, and minor aches and pains.'],
                // Add more medications for Common Cold as needed
            ],
            'Influenza (Flu)' => [
                ['name' => 'Antiviral drugs', 'description' => 'Shorten the duration of the flu and reduce the severity of symptoms.'],
                ['name' => 'Pain relievers', 'description' => 'Reduce fever, headaches, and minor aches and pains.'],
                ['name' => 'Cough syrups', 'description' => 'Relieve cough symptoms.'],
                // Add more medications for Influenza (Flu) as needed
            ],
            'Hypertension' => [
                ['name' => 'Angiotensin-converting enzyme (ACE) inhibitors', 'description' => 'Help relax blood vessels.'],
                ['name' => 'Beta blockers', 'description' => 'Reduce the workload on your heart and open your blood vessels.'],
                ['name' => 'Calcium channel blockers', 'description' => 'Relax the muscles of your blood vessels.'],
                // Add more medications for Hypertension as needed
            ],
            // Add more illnesses with their medications as needed
        ];

        return $medications[$illnessName] ?? [];
    }

    // private function seedCertificates()
    // {
    //     $patients = User::where('user_type', 1)->get();
    //     $doctors = User::where('user_type', 2)->get();

    //     // Create some sample certificates
    //     Certificate::create([
    //         'title' => 'First Aid Training',
    //         'description' => 'Completed a first aid training course',
    //         'date_received' => Carbon::now()->subMonths(6),
    //         'issuer' => 'Red Cross',
    //         'expiration_date' => Carbon::now()->addYears(1),
    //         'doctor_id' => $doctors->random()->id,
    //         'patient_id' => $patients->random()->id,
    //     ]);

    //     Certificate::create([
    //         'title' => 'Advanced Cardiac Life Support (ACLS) Certification',
    //         'description' => 'Achieved ACLS certification',
    //         'date_received' => Carbon::now()->subMonths(3),
    //         'issuer' => 'American Heart Association',
    //         'expiration_date' => Carbon::now()->addYears(2),
    //         'doctor_id' => $doctors->random()->id,
    //         'patient_id' => $patients->random()->id,
    //     ]);

    //     Certificate::create([
    //         'title' => 'Dental Assistant Certification',
    //         'description' => 'Certified as a dental assistant',
    //         'date_received' => Carbon::now()->subYears(1),
    //         'issuer' => 'Dental Board of Certification',
    //         'expiration_date' => null, // No expiration date
    //         'doctor_id' => $doctors->random()->id,
    //         'patient_id' => $patients->random()->id,
    //     ]);
    // }

    private function seedReviews()
    {
        $faker = Faker::create();

        // Retrieve some doctors and patients
        $doctors = User::where('user_type', 2)->get();
        $patients = User::where('user_type', 1)->get();

        // Create some sample reviews
        foreach ($doctors as $doctor) {
            // Randomly select a patient
            $patient = $patients->random();

            // Generate a random rating (between 1 and 5)
            $rating = $faker->numberBetween(1, 5);

            // Generate a random comment
            $comment = $faker->sentence;

            Review::create([
                'patient_id' => $patient->id,
                'doctor_id' => $doctor->id,
                'rating' => $rating,
                'comment' => $comment,
            ]);
        }
    }
}
