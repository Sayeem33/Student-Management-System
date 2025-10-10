@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Add New Enrollments</h2>

    <form action="{{ route('enrollments.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Enroll No</label>
            <input type="text" name="enroll_no" class="form-control" required>
        </div>

        {{-- Batch Dropdown --}}
        <div class="mb-3">
            <label>Batch</label>
            <select name="batch_id" class="form-control" required>
                <option value="">-- Select Batch --</option>
                @foreach($batches as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Student Dropdown --}}
        <div class="mb-3">
            <label>Student</label>
            <select name="student_id" class="form-control" required>
                <option value="">-- Select Student --</option>
                @foreach($students as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Join Date</label>
            <input type="date" name="join_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Fee</label>
            <input type="number" name="fee" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
