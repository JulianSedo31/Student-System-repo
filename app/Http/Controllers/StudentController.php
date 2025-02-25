<?php

namespace App\Http\Controllers;

use App\Models\Student;
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
        $student = new Student();
        $student->name = $data['name'];
        $student->address = $data['address'];
        $student->email = $data['email'];
        $student->age = $data['age'];
        $student->moto = $data['moto'];
        $student->password = Hash::make($data['password']); // hash the password
        $student->college_level = $data['college_level']; // set college level
        $student->save();

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
        $student->update($request->all());
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
