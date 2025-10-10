@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Edit Enrollment</h2>

    <form action="{{ route('enrollments.update', $enrollment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Enroll No</label>
            <input type="text" name="enroll_no" value="{{ $enrollment->enroll_no }}" class="form-control" required> 
        </div>

        {{-- Batch Dropdown --}}
        <div class="mb-3">
            <label>Batch</label>
            <select name="batch_id" class="form-control" required>
                <option value="">-- Select Batch --</option>
                @foreach($batches as $id => $name)
                    <option value="{{ $id }}" {{ $enrollment->batch_id == $id ? 'selected' : '' }}>
                        {{ $name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Student Dropdown --}}
        <div class="mb-3">
            <label>Student</label>
            <select name="student_id" class="form-control" required>
                <option value="">-- Select Student --</option>
                @foreach($students as $id => $name)
                    <option value="{{ $id }}" {{ $enrollment->student_id == $id ? 'selected' : '' }}>
                        {{ $name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Join Date</label>
            <input type="date" name="join_date" value="{{ $enrollment->join_date }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Fee</label>
            <input type="number" name="fee" value="{{ $enrollment->fee }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('enrollments.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
