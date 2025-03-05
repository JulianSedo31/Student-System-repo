@extends('layouts.dashboardlayout')
@section('title', 'Grades')
@section('content')

<div class="container-fluid px-4">
    <h1>Student Grades</h1>
    <h2>Student Name: {{$student->name}}</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Subject</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            @foreach($grades as $grade)
                <tr>
                    <td>{{ $grade->subject }}</td>
                    <td>{{ $grade->grade }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
