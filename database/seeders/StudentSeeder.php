<?php

namespace Database\Seeders;

use App\Models\Campus;
use App\Models\Cohort;
use App\Models\Student;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::factory(2)->create();
    }
}
