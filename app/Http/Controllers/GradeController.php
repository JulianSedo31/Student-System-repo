<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\UpdateGradeRequest;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::all();
        return view('grade.gra_index', ['grades' => $grades]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('grade.gra_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGradeRequest $request)
    {
        $data = $request->validated();
        $grade = new Grade();
        $grade->student_id = $data['student_id'];
        $grade->subject_id = $data['subject_id'];
        $grade->grade = $data['grade'];
        $grade->remarks = $data['remarks'];
        $grade->save();

        session()->flash('confirmMessage', 'Grade added successfully');
        session()->flash('alertType', 'success');

        return redirect()->route('grade.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grade)
    {
        return view('grade.gra_view', ['grade' => $grade]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {
        return view('grade.gra_edit', ['grade' => $grade]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGradeRequest $request, Grade $grade)
    {
        $data = $request->validated();
        $grade->student_id = $data['student_id'];
        $grade->subject_id = $data['subject_id'];
        $grade->grade = $data['grade'];
        $grade->remarks = $data['remarks'];
        $grade->save();

        session()->flash('confirmMessage', 'Grade updated successfully');
        session()->flash('alertType', 'success');

        return redirect()->route('grade.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grade $grade)
    {
        $grade->delete();

        session()->flash('confirmMessage', 'Grade deleted successfully');
        session()->flash('alertType', 'success');

        return redirect()->route('grade.index');
    }
}
