@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Batch Details</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $batch->id }}</p>
            <p><strong>Name:</strong> {{ $batch->name }}</p>
            <p><strong>Course:</strong> {{ $batch->course->name ?? 'N/A' }}</p>
            <p><strong>Start Date:</strong> {{ $batch->start_date }}</p>
        </div>
    </div>

    <a href="{{ route('batches.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
