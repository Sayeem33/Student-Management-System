@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Add New courses</h2>

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>syllabus</label>
            <input type="text" name="syllabus" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>duration</label>
            <input type="text" name="duration" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
