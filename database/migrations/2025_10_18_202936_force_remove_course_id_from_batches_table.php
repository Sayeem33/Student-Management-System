<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('batches', function (Blueprint $table) {
            // First, drop the foreign key constraint if it exists
            try {
                $table->dropForeign(['course_id']);
            } catch (\Exception $e) {
                // Foreign key might not exist, continue
            }
            
            // Then drop the column if it exists
            if (Schema::hasColumn('batches', 'course_id')) {
                $table->dropColumn('course_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('batches', function (Blueprint $table) {
            // Re-add the column if rolling back
            $table->unsignedBigInteger('course_id')->nullable();
        });
    }
};
