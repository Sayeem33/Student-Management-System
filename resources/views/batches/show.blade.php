@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Batch Details</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $batch->id }}</p>
            <p><strong>Name:</strong> {{ $batch->name }}</p>
            <p><strong>Courses:</strong> 
                @if($batch->courses && $batch->courses->count() > 0)
                    @foreach($batch->courses as $course)
                        <span class="badge bg-info">{{ $course->name }}</span>
                    @endforeach
                @else
                    <span class="text-muted">No courses assigned</span>
                @endif
            </p>
            <p><strong>Start Date:</strong> {{ $batch->start_date }}</p>
        </div>
    </div>

    <a href="{{ route('batches.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
