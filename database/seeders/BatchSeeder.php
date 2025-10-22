<?php

namespace Database\Seeders;

use App\Models\Batch;
use Illuminate\Database\Seeder;

class BatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $batches = [
            ['name' => 'Batch A - Morning', 'start_date' => '2025-01-01'],
            ['name' => 'Batch B - Afternoon', 'start_date' => '2025-01-15'],
            ['name' => 'Batch C - Evening', 'start_date' => '2025-02-01'],
            ['name' => 'Batch D - Weekend', 'start_date' => '2025-02-15'],
            ['name' => 'Batch E - Morning', 'start_date' => '2025-03-01'],
            ['name' => 'Batch F - Afternoon', 'start_date' => '2025-03-15'],
        ];

        foreach ($batches as $index => $batch) {
            $createdBatch = Batch::create($batch);
            
            // Attach 1-3 random courses to each batch (many-to-many relationship)
            // Courses IDs: 1-8 (we created 8 courses)
            $courseIds = [];
            $numberOfCourses = rand(1, 3);
            
            for ($i = 0; $i < $numberOfCourses; $i++) {
                $courseId = rand(1, 8);
                if (!in_array($courseId, $courseIds)) {
                    $courseIds[] = $courseId;
                }
            }
            
            $createdBatch->courses()->attach($courseIds);
        }
    }
}
