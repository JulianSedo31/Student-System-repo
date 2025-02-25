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

    <form action="{{route('student.store')}}" method="post">
        @csrf
        @method('POST')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="">
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="">
        </div>

        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" class="form-control" id="age" name="age" value="">
        </div>

        <div class="form-group">
            <label for="moto">Moto</label>
            <input type="text" class="form-control" id="moto" name="moto" value="">
        </div>

        <div class="form-group">
            <label for="college_level">College Level</label>
            <input type="text" class="form-control" id="college_level" name="college_level" value="">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="">
        </div>

        <button type="submit" class="btn btn-primary">save</button>
    </form>
</div>

<a href="{{route('student.index')}}">
    <button class="btn btn-primary">
        back
    </button>
</a>



@endsection

