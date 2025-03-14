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
        $grades = [0.00, 1.00, 1.25, 1.50, 1.75, 2.00, 2.25, 2.50, 2.75, 
                   3.00, 3.25, 3.50, 3.75, 4.00, 4.25, 4.50, 4.75, 5.00];
        
        return [
            'student_id' => Student::factory(),
            'subject_id' => Subject::factory(),
            'grade' => $this->faker->randomElement($grades),
            'remarks' => $this->faker->sentence(),
        ];
    }
}
