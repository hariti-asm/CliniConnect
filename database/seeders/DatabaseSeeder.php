<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Speciality;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

// Seed data for specialties
        Speciality::create([
            'name' => 'General Health'
        ]);

        Speciality::create([
            'name' => 'Cardiology'
        ]);

        Speciality::create([
            'name' => 'Dental'
        ]);

        Speciality::create([
            'name' => 'Medical Research'
        ]);

    }
}
