<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            ['name' => 'Ahmed Hassan', 'address' => 'Dhaka, Bangladesh', 'mobile' => '01712345678'],
            ['name' => 'Fatima Khan', 'address' => 'Chittagong, Bangladesh', 'mobile' => '01812345679'],
            ['name' => 'Mohammad Ali', 'address' => 'Sylhet, Bangladesh', 'mobile' => '01912345680'],
            ['name' => 'Ayesha Rahman', 'address' => 'Rajshahi, Bangladesh', 'mobile' => '01612345681'],
            ['name' => 'Omar Faruk', 'address' => 'Khulna, Bangladesh', 'mobile' => '01512345682'],
            ['name' => 'Nadia Islam', 'address' => 'Barisal, Bangladesh', 'mobile' => '01712345683'],
            ['name' => 'Karim Abdullah', 'address' => 'Rangpur, Bangladesh', 'mobile' => '01812345684'],
            ['name' => 'Zainab Ahmed', 'address' => 'Mymensingh, Bangladesh', 'mobile' => '01912345685'],
            ['name' => 'Ibrahim Hossain', 'address' => 'Comilla, Bangladesh', 'mobile' => '01612345686'],
            ['name' => 'Mariam Begum', 'address' => 'Gazipur, Bangladesh', 'mobile' => '01512345687'],
            ['name' => 'Yusuf Malik', 'address' => 'Narayanganj, Bangladesh', 'mobile' => '01712345688'],
            ['name' => 'Hafsa Siddique', 'address' => 'Jessore, Bangladesh', 'mobile' => '01812345689'],
            ['name' => 'Tariq Hasan', 'address' => 'Bogra, Bangladesh', 'mobile' => '01912345690'],
            ['name' => 'Sumaya Khatun', 'address' => 'Dinajpur, Bangladesh', 'mobile' => '01612345691'],
            ['name' => 'Bilal Ahmed', 'address' => 'Pabna, Bangladesh', 'mobile' => '01512345692'],
            ['name' => 'Amina Sultana', 'address' => 'Kushtia, Bangladesh', 'mobile' => '01712345693'],
            ['name' => 'Hamza Rahman', 'address' => 'Tangail, Bangladesh', 'mobile' => '01812345694'],
            ['name' => 'Ruqayyah Ali', 'address' => 'Faridpur, Bangladesh', 'mobile' => '01912345695'],
            ['name' => 'Mustafa Khan', 'address' => 'Nawabganj, Bangladesh', 'mobile' => '01612345696'],
            ['name' => 'Khadija Begum', 'address' => 'Satkhira, Bangladesh', 'mobile' => '01512345697'],
        ];

        foreach ($students as $student) {
            Student::create($student);
        }
    }
}
