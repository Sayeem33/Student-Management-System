@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Edit course</h2>

    <form action="{{ route('courses.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ $course->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>syllabus</label>
            <input type="text" name="syllabus" value="{{ $course->syllabus }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>duration</label>
            <input type="text" name="duration" value="{{ $course->duration }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
