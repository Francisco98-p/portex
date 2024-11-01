<?php

namespace Database\Seeders;

use App\Models\PatientActivity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PatientActivity::factory()->count(10)->create();
    }
}
