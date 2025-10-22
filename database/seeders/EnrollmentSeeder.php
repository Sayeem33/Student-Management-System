<?php

namespace Database\Seeders;

use App\Models\Enrollment;
use Illuminate\Database\Seeder;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $enrollments = [
            ['enroll_no' => 'ENR001', 'student_id' => 1, 'batch_id' => 1, 'join_date' => '2025-01-01', 'fee' => 15000],
            ['enroll_no' => 'ENR002', 'student_id' => 2, 'batch_id' => 1, 'join_date' => '2025-01-02', 'fee' => 15000],
            ['enroll_no' => 'ENR003', 'student_id' => 3, 'batch_id' => 2, 'join_date' => '2025-01-15', 'fee' => 18000],
            ['enroll_no' => 'ENR004', 'student_id' => 4, 'batch_id' => 2, 'join_date' => '2025-01-16', 'fee' => 18000],
            ['enroll_no' => 'ENR005', 'student_id' => 5, 'batch_id' => 3, 'join_date' => '2025-02-01', 'fee' => 20000],
            ['enroll_no' => 'ENR006', 'student_id' => 6, 'batch_id' => 3, 'join_date' => '2025-02-02', 'fee' => 20000],
            ['enroll_no' => 'ENR007', 'student_id' => 7, 'batch_id' => 4, 'join_date' => '2025-02-15', 'fee' => 12000],
            ['enroll_no' => 'ENR008', 'student_id' => 8, 'batch_id' => 4, 'join_date' => '2025-02-16', 'fee' => 12000],
            ['enroll_no' => 'ENR009', 'student_id' => 9, 'batch_id' => 5, 'join_date' => '2025-03-01', 'fee' => 16000],
            ['enroll_no' => 'ENR010', 'student_id' => 10, 'batch_id' => 5, 'join_date' => '2025-03-02', 'fee' => 16000],
            ['enroll_no' => 'ENR011', 'student_id' => 11, 'batch_id' => 6, 'join_date' => '2025-03-15', 'fee' => 14000],
            ['enroll_no' => 'ENR012', 'student_id' => 12, 'batch_id' => 6, 'join_date' => '2025-03-16', 'fee' => 14000],
            ['enroll_no' => 'ENR013', 'student_id' => 13, 'batch_id' => 1, 'join_date' => '2025-01-05', 'fee' => 15000],
            ['enroll_no' => 'ENR014', 'student_id' => 14, 'batch_id' => 2, 'join_date' => '2025-01-20', 'fee' => 18000],
            ['enroll_no' => 'ENR015', 'student_id' => 15, 'batch_id' => 3, 'join_date' => '2025-02-05', 'fee' => 20000],
            ['enroll_no' => 'ENR016', 'student_id' => 16, 'batch_id' => 4, 'join_date' => '2025-02-20', 'fee' => 12000],
            ['enroll_no' => 'ENR017', 'student_id' => 17, 'batch_id' => 5, 'join_date' => '2025-03-05', 'fee' => 16000],
            ['enroll_no' => 'ENR018', 'student_id' => 18, 'batch_id' => 6, 'join_date' => '2025-03-20', 'fee' => 14000],
            ['enroll_no' => 'ENR019', 'student_id' => 19, 'batch_id' => 1, 'join_date' => '2025-01-10', 'fee' => 15000],
            ['enroll_no' => 'ENR020', 'student_id' => 20, 'batch_id' => 2, 'join_date' => '2025-01-25', 'fee' => 18000],
        ];

        foreach ($enrollments as $enrollment) {
            Enrollment::create($enrollment);
        }
    }
}
