<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSchedulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create doctor schedule manuall

        \App\Models\DoctorSchedule::factory()->create([
            'doctor_id' => 1,
            'day' => 'Senin',
            'time' => '08:00 - 10:00',
            'status' => 'active',
        ]);

        // auto generate doctor schedule
        \App\Models\Doctor::all()->each(function($doctor){
            \App\Models\DoctorSchedule::factory()->count(10)->create([
                'doctor_id' => $doctor->id
            ]);
        });

        //\App\Models\DoctorSchedule::factory(10)->create();
    }
}
