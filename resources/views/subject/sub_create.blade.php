@extends('layouts.dashboardlayout')
@section('title', 'Create Subject')
@section('content')

<div class="container-fluid px-4">
    <h1>Create Subject</h1>
    <form action="{{ route('subject.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="code">Code</label>
            <input type="text" class="form-control" id="code" name="code" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>

@endsection

