<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    /** @use HasFactory<\Database\Factories\EnrollmentFactory> */
    use HasFactory;

    // Add the fillable property
    protected $fillable = [
        'student_id',
        'subject_id',
        'semester',
        'status',
    ];

    // Define the relationship with the Student model
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // Define the relationship with the Subject model
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
