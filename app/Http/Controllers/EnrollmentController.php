<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Subject;
use App\Http\Requests\StoreEnrollmentRequest;
use App\Http\Requests\UpdateEnrollmentRequest;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enrollmentList = Enrollment::all();
        $students = Student::all();
        $subjects = Subject::all();

        return view('enrollment.enr_index', [
            'enrollmentList' => $enrollmentList,
            'students' => $students,
            'subjects' => $subjects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        $subjects = Subject::all();
        return view("enrollment.enr_create", compact('students', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEnrollmentRequest $request)
    {
        $data = $request->validated();
        $enrollment = new Enrollment();
        $enrollment->student_id = $data['student_id'];
        $enrollment->subject_id = $data['subject_id'];
        $enrollment->semester = $data['semester'];
        $enrollment->status = $data['status'];
        $enrollment->save();

        session()->flash('confirmMessage', 'Enrollment added successfully');
        session()->flash('alertType', 'success');

        return redirect()->route('enrollment.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $enrollment = Enrollment::findOrFail($id);
        return view('enrollment.enr_view', compact('enrollment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enrollment $enrollment)
    {
        $students = Student::all();
        $subjects = Subject::all();
        return view('enrollment.enr_edit', compact('enrollment', 'students', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEnrollmentRequest $request, Enrollment $enrollment)
    {
        $data = $request->validated();
        $enrollment->student_id = $data['student_id'];
        $enrollment->subject_id = $data['subject_id'];
        $enrollment->semester = $data['semester'];
        $enrollment->status = $data['status'];
        $enrollment->save();

        session()->flash('confirmMessage', 'Enrollment updated successfully');
        session()->flash('alertType', 'success');

        return redirect()->route('enrollment.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();

        session()->flash('confirmMessage', 'Enrollment deleted successfully');
        session()->flash('alertType', 'success');

        return redirect()->route('enrollment.index');
    }
}
