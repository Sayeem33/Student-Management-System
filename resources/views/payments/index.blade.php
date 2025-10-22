@extends('layout')

@section('content')
<div class="container">
    <h3 align="center" class="mt-5">Payments Management</h3>

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
                <form method="POST" action="{{ route('payments.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Enrollment No</label>
                            <select name="enrollment_id" id="enrollment_id" class="form-control" required>
                                <option value="">-- Select Enrollment --</option>
                                @foreach($enrollments as $id => $enroll_no)
                                    <option value="{{ $id }}">{{ $enroll_no }}</option>
                                @endforeach
                            </select>
                            <small class="text-muted" id="enrollment_info"></small>
                        </div>
                        <div class="col-md-6">
                            <label>Paid Date</label>
                            <input type="date" class="form-control" name="paid_date" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label>Amount (Auto-loaded from Enrollment Fee)</label>
                            <input type="number" class="form-control" id="amount" name="amount" readonly required style="background-color: #e9ecef;">
                            <small class="text-muted">Amount is automatically set based on the enrollment fee</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-primary" value="Done">
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

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const enrollmentSelect = document.getElementById('enrollment_id');
    const amountInput = document.getElementById('amount');
    const enrollmentInfo = document.getElementById('enrollment_info');

    enrollmentSelect.addEventListener('change', function() {
        const enrollmentId = this.value;
        
        if (enrollmentId) {
            // Fetch enrollment fee via AJAX
            fetch(`/api/enrollment/${enrollmentId}/fee`)
                .then(response => response.json())
                .then(data => {
                    amountInput.value = data.fee;
                    enrollmentInfo.innerHTML = `<i class="fas fa-info-circle"></i> Student: ${data.student_name} | Batch: ${data.batch_name}`;
                })
                .catch(error => {
                    console.error('Error fetching enrollment fee:', error);
                    alert('Error loading enrollment details. Please try again.');
                });
        } else {
            amountInput.value = '';
            enrollmentInfo.innerHTML = '';
        }
    });
});
</script>
@endpush
