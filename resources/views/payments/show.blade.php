@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>paymentes Details</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $payment->id }}</p>
            <p><strong>enrollment no:</strong> {{ $payment->enrollment_id }}</p>
            <p><strong>paid date:</strong> {{ $payment->paid_date }}</p>
            <p><strong>ammount:</strong> {{ $payment->amount }}</p>
        </div>
    </div>

    <a href="{{ route('payments.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
