<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Course;

class CoursePrerequisiteSeeder extends Seeder
{
    public function run()
    {
        // Fetch all courses from the database
        $courses = Course::pluck('id')->toArray();

        // Ensure there are at least 2 courses for prerequisites to work
        if (count($courses) < 2) {
            $this->command->warn('Not enough courses to assign prerequisites.');
            return;
        }

        // Assign random prerequisites
        foreach ($courses as $courseId) {
            // Select a random course as a prerequisite (excluding the current course)
            $prerequisiteId = collect($courses)
                ->reject(fn($id) => $id === $courseId) // Prevent self-referencing
                ->random();

            DB::table('course_prerequisites')->insert([
                'course_id' => $courseId,
                'prerequisite_id' => $prerequisiteId,
            ]);
        }

        $this->command->info('Course prerequisites seeded successfully!');
    }
}
