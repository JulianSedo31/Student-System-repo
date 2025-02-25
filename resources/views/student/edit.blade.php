@extends('layouts.dashboardlayout')
@section('title', 'Edit')
@section('content')


<div class="container-fluid px-4">
    @if(session('confirmMessage'))
    <div class="alert alert-{{ session('alertType') }} alert-dismissible fade show" role="alert">
        {{ session('confirmMessage') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <form action="{{ route('student.update', $student->id) }}" method="post">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $student->name) }}">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $student->address) }}">
            @error('address')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $student->email) }}">
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" class="form-control" id="age" name="age" value="{{ old('age', $student->age) }}">
            @error('age')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="moto">Moto</label>
            <input type="text" class="form-control" id="moto" name="moto" value="{{ old('moto', $student->moto) }}">
            @error('moto')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<a href="{{route('student.index')}}">
    <button class="btn btn-primary">
        back
    </button>
</a>



@endsection

