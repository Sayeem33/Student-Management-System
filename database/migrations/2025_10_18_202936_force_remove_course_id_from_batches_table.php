<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Check if column exists before trying to drop it
        if (Schema::hasColumn('batches', 'course_id')) {
            // Use raw SQL to handle foreign key removal more gracefully
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
            
            try {
                DB::statement('ALTER TABLE batches DROP COLUMN course_id');
            } catch (\Exception $e) {
                // Column might already be removed
            }
            
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Don't re-add the column as it's deprecated
    }
};
