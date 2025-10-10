@extends('layout')

@section('content')
<div class="container">
    <h3 align="center" class="mt-5">Enrollments Management</h3>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="form-area">
                <form method="POST" action="{{ route('enrollments.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Enroll No</label>
                            <input type="text" class="form-control" name="enroll_no" required>
                        </div>
                        <div class="col-md-6">
                            <label>Batch</label>
                            <select name="batch_id" class="form-control" required>
                                <option value="">-- Select Batch --</option>
                                @foreach($batches as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label>Student</label>
                            <select name="student_id" class="form-control" required>
                                <option value="">-- Select Student --</option>
                                @foreach($students as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Join Date</label>
                            <input type="date" class="form-control" name="join_date" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label>Fee</label>
                            <input type="number" class="form-control" name="fee" required>
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
                    <th>Enroll No</th>
                    <th>Batch</th>
                    <th>Student</th>
                    <th>Join Date</th>
                    <th>Fee</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($enrollments as $key => $enrollment)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $enrollment->enroll_no }}</td>
                        <td>{{ $enrollment->batch->name ?? $enrollment->batch_id }}</td>
                        <td>{{ $enrollment->student->name ?? $enrollment->student_id }}</td>
                        <td>{{ $enrollment->join_date }}</td>
                        <td>{{ $enrollment->fee }}</td>
                        <td>
                            <a href="{{ route('enrollments.show', $enrollment->id) }}">
                                <button class="btn btn-info btn-sm">
                                    <i class="fa fa-eye"></i> View
                                </button>
                            </a>
                            <a href="{{ route('enrollments.edit', $enrollment->id) }}">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil-square-o"></i> Edit
                                </button>
                            </a>
                            <form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="POST" style="display:inline">
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
