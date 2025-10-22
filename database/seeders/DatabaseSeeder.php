<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * 
     * Run all seeders in the correct order to populate the database
     * with sample data for testing and demonstration purposes.
     * 
     * Usage: php artisan db:seed
     * Or: php artisan migrate:fresh --seed (to reset and seed)
     */
    public function run(): void
    {
        // Call all seeders in dependency order
        $this->call([
            UserSeeder::class,        // 1. Create users (admin + regular users)
            StudentSeeder::class,     // 2. Create students
            TeacherSeeder::class,     // 3. Create teachers
            CourseSeeder::class,      // 4. Create courses
            BatchSeeder::class,       // 5. Create batches (links to courses via pivot)
            EnrollmentSeeder::class,  // 6. Create enrollments (needs students & batches)
            PaymentSeeder::class,     // 7. Create payments (needs enrollments)
        ]);

        $this->command->info('✅ Database seeding completed successfully!');
        $this->command->info('📊 Summary:');
        $this->command->info('   - Users: 6 (1 admin + 5 regular)');
        $this->command->info('   - Students: 20');
        $this->command->info('   - Teachers: 10');
        $this->command->info('   - Courses: 8');
        $this->command->info('   - Batches: 6');
        $this->command->info('   - Enrollments: 20');
        $this->command->info('   - Payments: 15');
        $this->command->info('');
        $this->command->info('🔑 Login Credentials:');
        $this->command->info('   Admin: admin@sms.com / password');
        $this->command->info('   User: john@example.com / password');
    }
}
