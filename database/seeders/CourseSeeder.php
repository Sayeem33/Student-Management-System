<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'name' => 'Web Development',
                'syllabus' => 'HTML5, CSS3, JavaScript, PHP, Laravel Framework, MySQL Database, RESTful APIs',
                'duration' => '6 months',
            ],
            [
                'name' => 'Mobile App Development',
                'syllabus' => 'Java, Kotlin, Android Studio, Flutter, Dart, React Native, Firebase',
                'duration' => '8 months',
            ],
            [
                'name' => 'Data Science & Machine Learning',
                'syllabus' => 'Python, Pandas, NumPy, Scikit-learn, TensorFlow, Deep Learning, Data Visualization',
                'duration' => '10 months',
            ],
            [
                'name' => 'Digital Marketing',
                'syllabus' => 'SEO, SEM, Social Media Marketing, Google Ads, Email Marketing, Content Strategy',
                'duration' => '4 months',
            ],
            [
                'name' => 'Graphic Design',
                'syllabus' => 'Adobe Photoshop, Illustrator, InDesign, Figma, UI/UX Principles, Brand Identity',
                'duration' => '5 months',
            ],
            [
                'name' => 'Database Administration',
                'syllabus' => 'MySQL, PostgreSQL, MongoDB, Database Design, Query Optimization, Backup & Recovery',
                'duration' => '6 months',
            ],
            [
                'name' => 'Cyber Security',
                'syllabus' => 'Network Security, Ethical Hacking, Penetration Testing, Cryptography, Security Tools',
                'duration' => '7 months',
            ],
            [
                'name' => 'Cloud Computing',
                'syllabus' => 'AWS, Azure, Google Cloud, Docker, Kubernetes, DevOps, CI/CD Pipelines',
                'duration' => '6 months',
            ],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
