@extends('layout')

@section('content')
<div class="container">
    <h3 align="center" class="mt-5">Batches Management</h3>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="form-area">
                <form method="POST" action="{{ route('batches.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Batch Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label>Course</label>
                            <select name="course_id" class="form-control" required>
                                <option value="">-- Select Course --</option>
                                @foreach($courses as $id => $course_name)
                                    <option value="{{ $id }}" {{ old('course_id') == $id ? 'selected' : '' }}>
                                        {{ $course_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label>Start Date</label>
                            <input type="date" class="form-control" name="start_date" value="{{ old('start_date') }}" required>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Register">
                        </div>
                    </div>
                </form>
            </div>

            <table class="table mt-5">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Batch Name</th>
                    <th>Course</th>
                    <th>Start Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($batches as $key => $batch)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $batch->name }}</td>
                        <td>{{ $batch->course->name ?? 'N/A' }}</td>
                        <td>{{ $batch->start_date }}</td>
                        <td>
                            <a href="{{ route('batches.show', $batch->id) }}">
                                <button class="btn btn-info btn-sm">
                                    <i class="fa fa-eye"></i> View
                                </button>
                            </a>
                            <a href="{{ route('batches.edit', $batch->id) }}">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil-square-o"></i> Edit
                                </button>
                            </a>
                            <form action="{{ route('batches.destroy', $batch->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
.form-area{
    padding: 20px;
    margin-top: 20px;
    background-color:#b3e5fc;
}
.bi-trash-fill{
    color:red;
    font-size: 18px;
}
.bi-pencil{
    color:green;
    font-size: 18px;
    margin-left: 20px;
}
</style>
@endpush
