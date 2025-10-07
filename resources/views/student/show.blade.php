@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Student Details</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $student->id }}</p>
            <p><strong>Name:</strong> {{ $student->name }}</p>
            <p><strong>Address:</strong> {{ $student->address }}</p>
            <p><strong>Mobile:</strong> {{ $student->mobile }}</p>
        </div>
    </div>

    <a href="{{ route('student.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
