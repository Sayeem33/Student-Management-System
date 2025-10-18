@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Add New Batch</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('batches.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Batch Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Courses (Select Multiple)</label>
            <select name="course_ids[]" class="form-control" multiple required style="height: 150px;">
                @foreach($courses as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
            <small class="form-text text-muted">Hold Ctrl (Windows) or Cmd (Mac) to select multiple courses</small>
        </div>

        <div class="mb-3">
            <label>Start Date</label>
            <input type="date" name="start_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
