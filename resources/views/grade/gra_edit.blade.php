@extends('layouts.dashboardlayout')
@section('title', 'Edit Grade')
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Grade</h1>
    <form action="{{ route('grade.update', $grade->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="student_id">Student ID</label>
            <input type="number" class="form-control" id="student_id" name="student_id" value="{{ $grade->student_id }}" required>
        </div>
        <div class="form-group">
            <label for="subject_id">Subject ID</label>
            <input type="number" class="form-control" id="subject_id" name="subject_id" value="{{ $grade->subject_id }}" required>
        </div>
        <div class="form-group">
            <label for="grade">Grade</label>
            <input type="number" 
                   step="0.25" 
                   min="0.00" 
                   max="5.00" 
                   class="form-control" 
                   id="grade" 
                   name="grade" 
                   value="{{ number_format($grade->grade, 2) }}" 
                   required 
                   pattern="\d+(\.\d{2})?"
                   placeholder="0.00">
        </div>
        <div class="form-group">
            <label for="remarks">Remarks</label>
            <input type="text" class="form-control" id="remarks" name="remarks" value="{{ $grade->remarks }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Grade</button>
    </form>
</div>

@endsection

