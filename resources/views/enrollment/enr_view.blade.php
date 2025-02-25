@extends('layouts.dashboardlayout')
@section('title', 'View Enrollment')
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Enrollment Details</h1>
    <p><strong>Student:</strong> {{ $enrollment->student->name }}</p>
    <p><strong>Subject:</strong> {{ $enrollment->subject->name }}</p>
    <p><strong>Semester:</strong> {{ $enrollment->semester }}</p>
    <p><strong>Status:</strong> {{ $enrollment->status }}</p>
</div>

<a href="{{ route('enrollment.index') }}">
    <button class="btn btn-primary">Back to Enrollment List</button>
</a>

@endsection    
                