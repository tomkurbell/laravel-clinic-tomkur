<?php

namespace Database\Seeders;

use App\Models\ServiceMedicines;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceMedicinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServiceMedicines::factory(10)->create();
    }
}
