<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentList = Student::all();
        // dd($studentList);
        return view('student.index',
        [
            'studentList' => $studentList
        ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("student.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $data = $request->validated();

        // Create a new student
        $student = Student::create([
            'name' => $data['name'],
            'address' => $data['address'],
            'email' => $data['email'],
            'age' => $data['age'],
            'moto' => $data['moto'],
            'password' => Hash::make($data['password']), // Hash the password
            'college_level' => $data['college_level'],
        ]);

        // Create a corresponding user for authentication
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']), // Ensure the password is hashed
            'role' => 'student', // Set the role to student
        ]);

        // Set success message
        session()->flash('confirmMessage', 'Student added successfully');
        session()->flash('alertType', 'success');

        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $studentList = [$student]; // Create a list with a single student
        return view("student.index",
        [
            "studentList" => $studentList
        ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        
        return view('student.edit',
        [
            'student' => $student
        ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'age' => 'required|integer|min:18',
            'moto' => 'required|string|max:255',
            'password' => 'nullable|string|min:8', // Password is optional
            'college_level' => 'required|string|max:255',
        ]);

        // Update student details
        $student->name = $validatedData['name'];
        $student->address = $validatedData['address'];
        $student->email = $validatedData['email'];
        $student->age = $validatedData['age'];
        $student->moto = $validatedData['moto'];
        $student->college_level = $validatedData['college_level'];

        // Check if a new password is provided
        if (!empty($validatedData['password'])) {
            $student->password = Hash::make($validatedData['password']);
        }

        $student->save();

        // Update the corresponding user record
        $user = User::where('email', $student->email)->first();
        if ($user) {
            $user->name = $student->name;
            $user->email = $student->email;
            if (!empty($validatedData['password'])) {
                $user->password = Hash::make($validatedData['password']);
            }
            $user->save();
        }

        return redirect()->route('student.index')->with([
            'confirmMessage' => 'Student updated successfully!',
            'alertType' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        // dd($student);
        $student->delete();

        session()->flash('confirmMessage', 'Student deleted successfully');
        session()->flash('alertType', 'success');

        return redirect()->route('student.index');
    }
}
