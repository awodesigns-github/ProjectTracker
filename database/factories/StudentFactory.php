<?php

namespace Database\Factories;

use App\Models\Campus;
use App\Models\Cohort;
use App\Models\Course;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'registration_number' => $this->faker->numberBetween(1000, 9999),
            'github_username' => $this->faker->userName(),
            'user_id' => $this->faker->numberBetween(1, 2),
            'cohort_id' => $this->faker->numberBetween(1, 10),
            'campus_id' =>$this->faker->numberBetween(1, 10),
            'course_id' => $this->faker->numberBetween(1, 10),
            'team_id' => $this->faker->numberBetween(1, 10)
        ];
    }
}
