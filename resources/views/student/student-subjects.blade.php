@extends('layouts.student-dashboard')
@section('title', 'My Subjects')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">My Subjects</h1>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-book me-1"></i>
            Enrolled Subjects
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Subject Name</th>
                        <th>Code</th>
                        <th>Description</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($enrollments as $enrollment)
                    <tr>
                        <td>{{ $enrollment->subject->name }}</td>
                        <td>{{ $enrollment->subject->code }}</td>
                        <td>{{ $enrollment->subject->description }}</td>
                        <td>{{ $enrollment->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection 