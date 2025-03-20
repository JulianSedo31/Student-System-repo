@extends('layouts.student-dashboard')
@section('title', 'Dashboard')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Student Dashboard</h1>
    <ol class="breadcrumb mb-4 bg-light p-3 rounded shadow-sm">
        <li class="breadcrumb-item active">Welcome, {{ Auth::user()->name }}</li>
    </ol>
    
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Cards Section -->
    <div class="row mb-4">
        @php
            $cards = [
                ['title' => 'My Grades', 'route' => 'student.grades', 'color' => 'primary', 'icon' => 'fa-book'],
                ['title' => 'My Subjects', 'route' => 'student.subjects', 'color' => 'warning', 'icon' => 'fa-list'],
            ];
        @endphp
        
        @foreach($cards as $card)
        <div class="col-xl-3 col-md-6">
            <div class="card bg-{{ $card['color'] }} text-white mb-4 shadow-lg">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">{{ $card['title'] }}</h5>
                    <i class="fas {{ $card['icon'] }} fa-2x"></i>
                </div>
                <div class="card-footer text-white small d-flex justify-content-between">
                    <a class="text-white stretched-link" href="{{ route($card['route']) }}">View Details</a>
                    <i class="fas fa-angle-right"></i>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
