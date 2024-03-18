<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'password' => Hash::make('password'),
            'phone' => '1234567890',
        ]);

        //seeder profile_clinics manual
        \App\Models\ProfileClinic::factory()->create([
            'name' => 'Klinik Jasmine',
            'address' => 'Jl. Kampung Kalimati RT 07/03 No. 33a',
            'phone' => '081288872705',
            'email' => 'dr.jasmine@klinik.com',
            'doctor_name' => 'Dr. Jasmine',
            'unique_code' => '123456',
        ]);

        //call
        $this->call([
            DoctorSeeder::class,
            DoctorSchedulesSeeder::class,
            PatientsSeeder::class
        ]);
    }
}
