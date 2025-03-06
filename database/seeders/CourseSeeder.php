<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use Illuminate\Support\Str;


class CourseSeeder extends Seeder
{
    public function run()
    {
        $courses = [
            // Mathematics
            ['code' => 'MTH101', 'name' => 'Calculus I', 'credit_units' => 3, 'department' => 'Mathematics', 'prerequisite_courses' => json_encode([])],
            ['code' => 'MTH102', 'name' => 'Calculus II', 'credit_units' => 3, 'department' => 'Mathematics', 'prerequisite_courses' => json_encode(['MTH101'])],
            ['code' => 'MTH201', 'name' => 'Linear Algebra', 'credit_units' => 3, 'department' => 'Mathematics', 'prerequisite_courses' => json_encode([])],
            ['code' => 'MTH202', 'name' => 'Differential Equations', 'credit_units' => 3, 'department' => 'Mathematics', 'prerequisite_courses' => json_encode(['MTH101'])],

            // Physics
            ['code' => 'PHY101', 'name' => 'General Physics', 'credit_units' => 3, 'department' => 'Physics', 'prerequisite_courses' => json_encode([])],
            ['code' => 'PHY102', 'name' => 'Mechanics', 'credit_units' => 3, 'department' => 'Physics', 'prerequisite_courses' => json_encode(['PHY101'])],
            ['code' => 'PHY201', 'name' => 'Electromagnetism', 'credit_units' => 3, 'department' => 'Physics', 'prerequisite_courses' => json_encode(['PHY102'])],
            ['code' => 'PHY202', 'name' => 'Modern Physics', 'credit_units' => 3, 'department' => 'Physics', 'prerequisite_courses' => json_encode(['PHY101'])],

            // Computer Science
            ['code' => 'CSC101', 'name' => 'Introduction to Programming', 'credit_units' => 3, 'department' => 'Computer Science', 'prerequisite_courses' => json_encode([])],
            ['code' => 'CSC102', 'name' => 'Data Structures', 'credit_units' => 3, 'department' => 'Computer Science', 'prerequisite_courses' => json_encode(['CSC101'])],
            ['code' => 'CSC201', 'name' => 'Algorithms', 'credit_units' => 3, 'department' => 'Computer Science', 'prerequisite_courses' => json_encode(['CSC102'])],
            ['code' => 'CSC202', 'name' => 'Operating Systems', 'credit_units' => 3, 'department' => 'Computer Science', 'prerequisite_courses' => json_encode(['CSC101'])],
            ['code' => 'CSC301', 'name' => 'Machine Learning', 'credit_units' => 3, 'department' => 'Computer Science', 'prerequisite_courses' => json_encode(['CSC201'])],

            // Electrical Engineering
            ['code' => 'EEE101', 'name' => 'Circuit Analysis', 'credit_units' => 3, 'department' => 'Electrical Engineering', 'prerequisite_courses' => json_encode([])],
            ['code' => 'EEE102', 'name' => 'Digital Electronics', 'credit_units' => 3, 'department' => 'Electrical Engineering', 'prerequisite_courses' => json_encode([])],
            ['code' => 'EEE201', 'name' => 'Microprocessors', 'credit_units' => 3, 'department' => 'Electrical Engineering', 'prerequisite_courses' => json_encode(['EEE102'])],

            // Biology
            ['code' => 'BIO101', 'name' => 'General Biology', 'credit_units' => 3, 'department' => 'Biology', 'prerequisite_courses' => json_encode([])],
            ['code' => 'BIO102', 'name' => 'Genetics', 'credit_units' => 3, 'department' => 'Biology', 'prerequisite_courses' => json_encode(['BIO101'])],

            // Business Administration
            ['code' => 'BUS101', 'name' => 'Principles of Management', 'credit_units' => 3, 'department' => 'Business Administration', 'prerequisite_courses' => json_encode([])],
            ['code' => 'BUS102', 'name' => 'Marketing Strategies', 'credit_units' => 3, 'department' => 'Business Administration', 'prerequisite_courses' => json_encode(['BUS101'])],

            // Economics
            ['code' => 'ECO101', 'name' => 'Microeconomics', 'credit_units' => 3, 'department' => 'Economics', 'prerequisite_courses' => json_encode([])],
            ['code' => 'ECO102', 'name' => 'Macroeconomics', 'credit_units' => 3, 'department' => 'Economics', 'prerequisite_courses' => json_encode(['ECO101'])],

            // Law
            ['code' => 'LAW101', 'name' => 'Introduction to Law', 'credit_units' => 3, 'department' => 'Law', 'prerequisite_courses' => json_encode([])],
            ['code' => 'LAW102', 'name' => 'Criminal Law', 'credit_units' => 3, 'department' => 'Law', 'prerequisite_courses' => json_encode(['LAW101'])],
            ['code' => 'LAW201', 'name' => 'Contract Law', 'credit_units' => 3, 'department' => 'Law', 'prerequisite_courses' => json_encode(['LAW101'])],

            // Medicine
            ['code' => 'MED101', 'name' => 'Anatomy', 'credit_units' => 3, 'department' => 'Medicine', 'prerequisite_courses' => json_encode([])],
            ['code' => 'MED102', 'name' => 'Physiology', 'credit_units' => 3, 'department' => 'Medicine', 'prerequisite_courses' => json_encode([])],
            ['code' => 'MED201', 'name' => 'Pathology', 'credit_units' => 3, 'department' => 'Medicine', 'prerequisite_courses' => json_encode(['MED101', 'MED102'])],
        ];

        foreach ($courses as &$course) {
            $course['id'] = Str::uuid();
        }

        Course::insert($courses);
    }
}
