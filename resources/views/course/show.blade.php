@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>courses Details</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $course->id }}</p>
            <p><strong>Name:</strong> {{ $course->name }}</p>
            <p><strong>syllabus:</strong> {{ $course->syllabus }}</p>
            <p><strong>duration:</strong> {{ $course->duration }}</p>
        </div>
    </div>

    <a href="{{ route('courses.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
