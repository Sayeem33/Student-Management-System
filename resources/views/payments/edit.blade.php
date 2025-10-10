@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Edit payment</h2>

    <form action="{{ route('payments.update', $payment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Enrollment</label>
            <select name="enrollment_id" class="form-control" required>
                <option value="">Select Enrollment</option>
                @foreach($enrollments as $id => $enroll_no)
                    <option value="{{ $id }}" {{ $payment->enrollment_id == $id ? 'selected' : '' }}>{{ $enroll_no }}</option> <!-- ID is the value -->
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Amount</label>
            <input type="number" name="amount" class="form-control" value="{{ $payment->amount }}" required>
        </div>
        <div class="mb-3">
            <label>Paid Date</label>
            <input type="date" name="paid_date" class="form-control" value="{{ $payment->paid_date }}" required>
        </div>
        
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('payments.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
