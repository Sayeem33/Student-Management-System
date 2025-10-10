@extends('layout')

@section('content')
<div class="container">
    <h3 align="center" class="mt-5">Payments Management</h3>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="form-area">
                <form method="POST" action="{{ route('payments.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Enrollment No</label>
                            <select name="enrollment_id" class="form-control" required>
                                <option value="">-- Select Enrollment --</option>
                                @foreach($enrollments as $id => $enroll_no)
                                    <option value="{{ $id }}">{{ $enroll_no }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Paid Date</label>
                            <input type="date" class="form-control" name="paid_date" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label>Amount</label>
                            <input type="number" class="form-control" name="amount" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-primary" value="Register">
                        </div>
                    </div>
                </form>
            </div>

            {{-- Payments Table --}}
            <table class="table mt-5">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Enrollment No</th>
                    <th>Paid Date</th>
                    <th>Amount</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $key => $payment)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $payment->enrollment->enroll_no ?? $payment->enrollment_id }}</td>
                        <td>{{ $payment->paid_date }}</td>
                        <td>{{ $payment->amount }}</td>
                        <td>
                            <a href="{{ route('payments.show', $payment->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                           {{-- Print Slip Button --}}
                            <a href="{{ route('payments.print', $payment->id) }}" target="_blank" class="btn btn-warning btn-sm mt-1">
                                Print Slip
                            </a>
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
</style>
@endpush
