<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payments = [
            ['enrollment_id' => 1, 'paid_date' => '2025-01-01', 'amount' => 15000],
            ['enrollment_id' => 2, 'paid_date' => '2025-01-02', 'amount' => 15000],
            ['enrollment_id' => 3, 'paid_date' => '2025-01-15', 'amount' => 18000],
            ['enrollment_id' => 4, 'paid_date' => '2025-01-16', 'amount' => 18000],
            ['enrollment_id' => 5, 'paid_date' => '2025-02-01', 'amount' => 20000],
            ['enrollment_id' => 6, 'paid_date' => '2025-02-02', 'amount' => 20000],
            ['enrollment_id' => 7, 'paid_date' => '2025-02-15', 'amount' => 12000],
            ['enrollment_id' => 8, 'paid_date' => '2025-02-16', 'amount' => 12000],
            ['enrollment_id' => 9, 'paid_date' => '2025-03-01', 'amount' => 16000],
            ['enrollment_id' => 10, 'paid_date' => '2025-03-02', 'amount' => 16000],
            ['enrollment_id' => 11, 'paid_date' => '2025-03-15', 'amount' => 14000],
            ['enrollment_id' => 12, 'paid_date' => '2025-03-16', 'amount' => 14000],
            ['enrollment_id' => 13, 'paid_date' => '2025-01-05', 'amount' => 15000],
            ['enrollment_id' => 14, 'paid_date' => '2025-01-20', 'amount' => 18000],
            ['enrollment_id' => 15, 'paid_date' => '2025-02-05', 'amount' => 20000],
        ];

        foreach ($payments as $payment) {
            Payment::create($payment);
        }
    }
}
