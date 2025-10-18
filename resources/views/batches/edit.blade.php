@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Edit Batch</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('batches.update', $batch->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ $batch->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Courses (Select Multiple)</label>
            <select name="course_ids[]" class="form-control" multiple required style="height: 150px;">
                @foreach($courses as $id => $name)
                    <option value="{{ $id }}" {{ in_array($id, $enrolledCourseIds ?? []) ? 'selected' : '' }}>
                        {{ $name }}
                    </option>
                @endforeach
            </select>
            <small class="form-text text-muted">Hold Ctrl (Windows) or Cmd (Mac) to select multiple courses</small>
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
