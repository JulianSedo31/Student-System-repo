@extends('layouts.dashboardlayout')
@section('title', 'Student Dashboard')
@section('content')

<div class="container-fluid px-4">
    <h1>Welcome, {{ Auth::guard('student')->user()->name }}</h1>
    <p>This is the student dashboard.</p>
</div>

@endsection
