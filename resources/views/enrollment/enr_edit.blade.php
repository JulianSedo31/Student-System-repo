@extends('layouts.dashboardlayout')
@section('title', 'Edit Enrollment')
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Enrollment</h1>
    <form action="{{ route('enrollment.update', $enrollment->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="student_id">Student</label>
            <select class="form-control" id="student_id" name="student_id">
                @foreach($students as $student)
                <option value="{{ $student->id }}" {{ $enrollment->student_id == $student->id ? 'selected' : '' }}>{{ $student->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="subject_id">Subject</label>
            <select class="form-control" id="subject_id" name="subject_id">
                @foreach($subjects as $subject)
                <option value="{{ $subject->id }}" {{ $enrollment->subject_id == $subject->id ? 'selected' : '' }}>{{ $subject->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="semester">Semester</label>
            <input type="text" class="form-control" id="semester" name="semester" value="{{ $enrollment->semester }}">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" id="status" name="status" value="{{ $enrollment->status }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection

