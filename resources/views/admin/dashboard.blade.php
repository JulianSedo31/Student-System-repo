@extends('layouts.dashboardlayout')
@section('title', 'Admin Dashboard')
@section('content')

<div class="container-fluid px-4">
    <h1>Welcome, {{ Auth::user()->name }}</h1>
    <p>This is the admin dashboard.</p>
</div>

@endsection
