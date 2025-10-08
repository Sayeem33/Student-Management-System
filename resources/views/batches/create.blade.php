@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Add New Batch</h2>

    <form action="{{ route('batches.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Batch Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Course</label>

            <select name="course_id" class="form-control" required>
                <option value="">Select Course</option>
                @foreach($courses as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option> <!-- ID is the value -->
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Start Date</label>
            <input type="date" name="start_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
