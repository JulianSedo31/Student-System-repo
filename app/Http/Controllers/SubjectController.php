<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('subject.sub_index', ['subjects' => $subjects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subject.sub_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubjectRequest $request)
    {
        $data = $request->validated();
        $subject = new Subject();
        $subject->name = $data['name'];
        $subject->code = $data['code'];
        $subject->description = $data['description'];
        $subject->save();

        session()->flash('confirmMessage', 'Subject added successfully');
        session()->flash('alertType', 'success');

        return redirect()->route('subject.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        return view('subject.sub_view', ['subject' => $subject]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        return view('subject.sub_edit', ['subject' => $subject]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $data = $request->validated();
        $subject->name = $data['name'];
        $subject->code = $data['code'];
        $subject->description = $data['description'];
        $subject->save();

        session()->flash('confirmMessage', 'Subject updated successfully');
        session()->flash('alertType', 'success');

        return redirect()->route('subject.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();

        session()->flash('confirmMessage', 'Subject deleted successfully');
        session()->flash('alertType', 'success');

        return redirect()->route('subject.index');
    }
}
