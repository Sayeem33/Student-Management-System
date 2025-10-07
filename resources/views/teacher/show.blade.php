@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>teacher Details</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $teacher->id }}</p>
            <p><strong>Name:</strong> {{ $teacher->name }}</p>
            <p><strong>Address:</strong> {{ $teacher->address }}</p>
            <p><strong>Mobile:</strong> {{ $teacher->mobile }}</p>
        </div>
    </div>

    <a href="{{ route('teacher.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
