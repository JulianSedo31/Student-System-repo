@extends('layouts.dashboardlayout')
@section('title', 'Create Grade')
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Create Grade</h1>
    <form action="{{ route('grade.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="student_id">Student ID</label>
            <input type="number" class="form-control" id="student_id" name="student_id" required>
        </div>
        <div class="form-group">
            <label for="subject_id">Subject ID</label>
            <input type="number" class="form-control" id="subject_id" name="subject_id" required>
        </div>
        <div class="form-group">
            <label for="grade">Grade</label>
            <input type="number" step="0.1" class="form-control" id="grade" name="grade" required>
        </div>
        <div class="form-group">
            <label for="remarks">Remarks</label>
            <input type="text" class="form-control" id="remarks" name="remarks">
        </div>
        <button type="submit" class="btn btn-primary">Create Grade</button>
    </form>
</div>

@endsection

