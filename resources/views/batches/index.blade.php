@extends('layout')

@section('content')
<div class="container">
    <h3 align="center" class="mt-5">Batches Management</h3>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="form-area">
                <form method="POST" action="{{ route('batches.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Batch Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label>Courses (Select Multiple)</label>
                            <select name="course_ids[]" class="form-control" multiple required style="height: 100px;">
                                @foreach($courses as $id => $course_name)
                                    <option value="{{ $id }}" {{ (is_array(old('course_ids')) && in_array($id, old('course_ids'))) ? 'selected' : '' }}>
                                        {{ $course_name }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Hold Ctrl (Windows) or Cmd (Mac) to select multiple courses</small>
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
                        <td>
                            @if($batch->courses && $batch->courses->count() > 0)
                                @foreach($batch->courses as $course)
                                    <span class="badge bg-info">{{ $course->name }}</span>
                                @endforeach
                            @else
                                <span class="text-muted">No courses</span>
                            @endif
                        </td>
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
