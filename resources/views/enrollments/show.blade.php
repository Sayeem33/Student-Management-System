@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Enrollment Details</h2>

    <div class="mb-3">
        <strong>Enroll No:</strong>
        {{ $enrollment->enroll_no }}
    </div>
    <div class="mb-3">
        <strong>Batch:</strong>
        {{ $enrollment->batch->name ?? $enrollment->batch_id }}
    </div>
    <div class="mb-3">
        <strong>Student:</strong>
        {{ $enrollment->student->name ?? $enrollment->student_id }}
    </div>
    <div class="mb-3">
        <strong>Join Date:</strong>
        {{ $enrollment->join_date }}
    </div>
    <div class="mb-3">
        <strong>Fee:</strong>
        {{ $enrollment->fee }}
    </div>

    <a href="{{ route('enrollments.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
