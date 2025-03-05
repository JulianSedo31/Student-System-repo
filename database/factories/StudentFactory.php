<?php

namespace Database\Factories;

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
            'name' => $this->faker->name,
            'address' => $this->faker->address,
            'email' => $this->faker->unique()->safeEmail,
            'age' => $this->faker->numberBetween(18, 25),
            'moto' => $this->faker->sentence(),
            'password' => Hash::make('password'), // new attribute
            'college_level' => $this->faker->randomElement(['1st year', '2nd year', '3rd year', '4th year']) // new attribute
        ];
    }
}
