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
        Schema::create('timetables', function (Blueprint $table) {
            $table->uuid('id')->primary();  // Ensure primary key is UUID
            $table->uuid('course_id');  // Change to UUID
            $table->uuid('lecturer_id'); // If there's a lecturer reference
            $table->uuid('student_id')->nullable(); // If referencing students
            $table->uuid('classroom_id')->nullable(); // If referencing classrooms

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('lecturer_id')->references('id')->on('lecturers')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timetables');
    }
};
