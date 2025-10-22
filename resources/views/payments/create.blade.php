@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Add New Payment</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('payments.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Enrollment No</label>
            <select name="enrollment_id" id="enrollment_id" class="form-control" required>
                <option value="">Select Enrollment</option>
                @foreach($enrollments as $id => $enroll_no)
                    <option value="{{ $id }}">{{ $enroll_no }}</option>
                @endforeach
            </select>
            <small class="text-muted" id="enrollment_info"></small>
        </div>
        <div class="mb-3">
            <label>Amount (Auto-loaded from Enrollment Fee)</label>
            <input type="number" id="amount" name="amount" class="form-control" readonly required style="background-color: #e9ecef;">
            <small class="text-muted">Amount is automatically set based on the enrollment fee</small>
        </div>
        <div class="mb-3">
            <label>Paid Date</label>
            <input type="date" name="paid_date" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('payments.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection

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
