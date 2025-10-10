@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Add New payment</h2>

    <form action="{{ route('payments.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Enrollment</label>

            <select name="enrollment_id" class="form-control" required>
                <option value="">Select Enrollment</option>
                @foreach($enrollments as $id => $enroll_no)
                    <option value="{{ $id }}">{{ $enroll_no }}</option> <!-- ID is the value -->
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Amount</label>
            <input type="number" name="amount" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Paid Date</label>
            <input type="date" name="paid_date" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
