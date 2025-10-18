<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function printSlip($id)
    {
        // Load payment with enrollment, student, batch, and courses
        $payment = Payment::with('enrollment.student', 'enrollment.batch.courses')->findOrFail($id);

        // Generate PDF from Blade view
        $pdf = Pdf::loadView('reports.payment_slip', compact('payment'));

        // Download PDF with filename
        return $pdf->download('payment-slip-'.$payment->id.'.pdf');
    }
}
