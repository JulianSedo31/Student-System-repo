@extends('layouts.dashboardlayout')
@section('title', 'View Grade')
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">View Grade</h1>
    <p><strong>ID:</strong> {{ $grade->id }}</p>
    <p><strong>Student ID:</strong> {{ $grade->student_id }}</p>
    <p><strong>Subject ID:</strong> {{ $grade->subject_id }}</p>
    <p><strong>Grade:</strong> {{ number_format($grade->grade, 2) }}</p>
    <p><strong>Remarks:</strong> {{ $grade->remarks }}</p>
    <p><strong>Created At:</strong> {{ $grade->created_at }}</p>
    <p><strong>Updated At:</strong> {{ $grade->updated_at }}</p>
</div>

<a href="{{ route('grade.index') }}">
    <button class="btn btn-primary">Back</button>
</a>

@endsection    
                