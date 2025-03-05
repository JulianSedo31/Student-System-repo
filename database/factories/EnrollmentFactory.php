<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\Subject;
use App\Models\Enrollment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enrollment>
 */
class EnrollmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => Student::factory(), // Create a new student or use an existing one
            'subject_id' => Subject::factory(), // Create a new subject or use an existing one
            'semester' => $this->faker->randomElement(['Fall', 'Spring', 'Summer']),
            'status' => $this->faker->randomElement(['enrolled', 'completed', 'dropped']),
        ];
    }
}
