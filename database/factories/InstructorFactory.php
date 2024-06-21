<?php

namespace Database\Factories;

use App\Models\Campus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Instructor>
 */
class InstructorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => "EMP-".$this->faker->swiftBicNumber(),
            'github_username' => $this->faker->userName(),
            'user_id' => $this->faker->numberBetween(3, 4),
            'campus_id' => Campus::factory()
        ];
    }
}
