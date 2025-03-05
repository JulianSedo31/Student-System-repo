@extends('layouts.dashboardlayout')
@section('title', 'Edit Subject')
@section('content')

<div class="container-fluid px-4">
    <h1>Edit Subject</h1>
    <form action="{{ route('subject.update', $subject->id) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $subject->name) }}" required>
        </div>
        <div class="form-group">
            <label for="code">Code</label>
            <input type="text" class="form-control" id="code" name="code" value="{{ old('code', $subject->code) }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $subject->description) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection

