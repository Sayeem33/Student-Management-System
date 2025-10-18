<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Payment Slip</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        h2 { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        td, th { border: 1px solid #333; padding: 8px; text-align: left; }
        .footer { text-align: center; margin-top: 40px; font-size: 14px; }
    </style>
</head>
<body>
    <h2>Payment Slip</h2>

    <table>
        <tr>
            <th>Slip No</th>
            <td>{{ $payment->id }}</td>
        </tr>
        <tr>
            <th>Student Name</th>
            <td>{{ $payment->enrollment->student->name ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Batch</th>
            <td>{{ $payment->enrollment->batch->name ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Courses</th>
            <td>
                @if($payment->enrollment->batch && $payment->enrollment->batch->courses->count() > 0)
                    {{ $payment->enrollment->batch->courses->pluck('name')->join(', ') }}
                @else
                    N/A
                @endif
            </td>
        </tr>
        <tr>
            <th>Amount</th>
            <td>{{ $payment->amount }}</td>
        </tr>
        <tr>
            <th>Payment Date</th>
            <td>{{ $payment->paid_date }}</td>
        </tr>
        <tr>
            <th>Method</th>
            <td>{{ $payment->method ?? 'Cash' }}</td>
        </tr>
    </table>

    <div class="footer">
        <p>Thank you for your payment!</p>
    </div>
</body>
</html>
