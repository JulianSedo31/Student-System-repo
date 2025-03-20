<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Enrollment;
use App\Models\Grade;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Create a test user with the student role
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'ggwap_test@example.com',
            'role' => 'student', // Set role to student
        ]);

        // Create an admin user
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'userAdmin@example.com',
            'role' => 'admin', // Ensure role is set to admin
            'password' => bcrypt('admin1234'), // Ensure password is hashed
        ]);

        Student::factory(10)->create();
        Subject::factory(10)->create();
        // Enrollment::factory(10)->create();
        // Grade::factory(10)->create();
    }
}