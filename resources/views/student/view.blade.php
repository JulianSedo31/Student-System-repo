@extends('layouts.dashboardlayout')
@section('title', 'View')
@section('content')

<div class="container-fluid px-4">
    <h1>Student View</h1>
    <h1>Student ID: {{$student->id}}</h1>
    <h1>Student Name: {{$student->name}}</h1>
    <h1>Student Address: {{$student->address}}</h1>
    <h1>Student College Level: {{$student->college_level}}</h1>
    <h1>Student Password: {{$student->password}}</h1>
    <h1>Created At: {{$student->created_at}}</h1>
    <h1>Updated At: {{$student->updated_at}}</h1>
</div>

<a href="{{route('student.index')}}">
    <button class="btn btn-primary">
        back
    </button>
</a>

@endsection
