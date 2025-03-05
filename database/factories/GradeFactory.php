<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;
use App\Models\Subject;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grade>
 */
class GradeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => Student::factory(),
            'subject_id' => Subject::factory(),
            'grade' => $this->faker->randomFloat(1.0, 2.0, 3.0, 4.0, 5.0, 1.25, 2.75, 3.25, 1.50, 2.50, 3.50, 4.0, 5.0),
            'remarks' => $this->faker->sentence(),
        ];
    }
}
