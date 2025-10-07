@extends('layout')

@section('content')
<div class="container">
    <h3 align="center" class="mt-5">Student Management</h3>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="form-area">
                <form method="POST" action="{{ route('student.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Student Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="col-md-6">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Mobile</label>
                            <input type="text" class="form-control" name="mobile">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-primary" value="Register">
                        </div>
                    </div>
                </form>
            </div>

            <table class="table mt-5">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Address</th>
                    <th>Mobile</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($students as $key => $student)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->address }}</td>
                        <td>{{ $student->mobile }}</td>
                        <td>
                            <a href="{{ route('student.show', $student->id) }}">
                                <button class="btn btn-info btn-sm">
                                    <i class="fa fa-eye"></i> View
                                </button>
                            <a href="{{ route('student.edit', $student->id) }}">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil-square-o"></i> Edit
                                </button>
                            </a>
                            <form action="{{ route('student.destroy', $student->id) }}" method="POST" style="display:inline">
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
