@extends('layouts.dashboardlayout')
@section('title', 'View Subject')
@section('content')

<div class="container-fluid px-4">
    <h1>Subject Details</h1>
    <p><strong>ID:</strong> {{ $subject->id }}</p>
    <p><strong>Name:</strong> {{ $subject->name }}</p>
    <p><strong>Code:</strong> {{ $subject->code }}</p>
    <p><strong>Description:</strong> {{ $subject->description }}</p>
</div>

<a href="{{ route('subject.index') }}">
    <button class="btn btn-primary">Back</button>
</a>

@endsection    
                