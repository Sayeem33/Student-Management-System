<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = [
            ['name' => 'Dr. Kamal Uddin', 'address' => 'Dhaka University Area', 'mobile' => '01711111111'],
            ['name' => 'Prof. Sabina Yasmin', 'address' => 'Gulshan, Dhaka', 'mobile' => '01722222222'],
            ['name' => 'Mr. Rafiqul Islam', 'address' => 'Dhanmondi, Dhaka', 'mobile' => '01733333333'],
            ['name' => 'Ms. Sharmila Begum', 'address' => 'Mirpur, Dhaka', 'mobile' => '01744444444'],
            ['name' => 'Dr. Anwar Hossain', 'address' => 'Uttara, Dhaka', 'mobile' => '01755555555'],
            ['name' => 'Mrs. Nasima Akhter', 'address' => 'Mohammadpur, Dhaka', 'mobile' => '01766666666'],
            ['name' => 'Mr. Habibur Rahman', 'address' => 'Banani, Dhaka', 'mobile' => '01777777777'],
            ['name' => 'Ms. Taslima Nasrin', 'address' => 'Bashundhara, Dhaka', 'mobile' => '01788888888'],
            ['name' => 'Dr. Mahbubul Alam', 'address' => 'Motijheel, Dhaka', 'mobile' => '01799999999'],
            ['name' => 'Prof. Roksana Parvin', 'address' => 'Lalmatia, Dhaka', 'mobile' => '01700000000'],
        ];

        foreach ($teachers as $teacher) {
            Teacher::create($teacher);
        }
    }
}
