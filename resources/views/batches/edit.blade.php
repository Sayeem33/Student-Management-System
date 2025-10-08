@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Edit Batch</h2>

    <form action="{{ route('batches.update', $batch->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ $batch->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Course</label>
            <select name="course_id" class="form-control" required>
                <option value="">Select Course</option>
                @foreach($courses as $id => $name)
                    <option value="{{ $id }}" {{ $batch->course_id == $id ? 'selected' : '' }}>
                        {{ $name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Start Date</label>
            <input type="date" name="start_date" value="{{ $batch->start_date }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('batches.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
