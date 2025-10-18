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
        // Check if the column exists before dropping (avoids errors)
        Schema::table('batches', function (Blueprint $table) {
            if (Schema::hasColumn('batches', 'course_id')) {
                $table->dropForeign(['course_id']);
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
            if (!Schema::hasColumn('batches', 'course_id')) {
                $table->foreignId('course_id')->constrained()->onDelete('cascade');
            }
        });
    }
};
