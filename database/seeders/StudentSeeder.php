<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Support\Str;

class StudentSeeder extends Seeder
{
    public function run()
    {
        // Retrieve courses as an indexed array of codes
        $courses = array_values(Course::pluck('code', 'id')->toArray());

        if (count($courses) < 8) {
            throw new \Exception("Not enough courses available in the database.");
        }

        $students = [
            ['name' => 'Alice Johnson', 'level' => 200, 'courses' => json_encode([1, 2]), 'outstanding_courses' => json_encode([])],
            ['name' => 'Bob Williams', 'level' => 300, 'courses' => json_encode([2, 3]), 'outstanding_courses' => json_encode([$courses[0] ?? null])], // Carryover in first course
            ['name' => 'Charlie Brown', 'level' => 400, 'courses' => json_encode([1, 3]), 'outstanding_courses' => json_encode([$courses[1] ?? null])], // Carryover
            ['name' => 'David Smith', 'level' => 100, 'courses' => json_encode([4, 5]), 'outstanding_courses' => json_encode([])],
            ['name' => 'Emily White', 'level' => 200, 'courses' => json_encode([6, 7]), 'outstanding_courses' => json_encode([$courses[2] ?? null])], // Carryover
            ['name' => 'Frank Clark', 'level' => 300, 'courses' => json_encode([8, 9]), 'outstanding_courses' => json_encode([$courses[3] ?? null])], // Carryover
            ['name' => 'Grace Lewis', 'level' => 400, 'courses' => json_encode([10, 11]), 'outstanding_courses' => json_encode([])],
            ['name' => 'Henry Baker', 'level' => 100, 'courses' => json_encode([12, 13]), 'outstanding_courses' => json_encode([$courses[4] ?? null])], // Carryover
            ['name' => 'Ivy Scott', 'level' => 200, 'courses' => json_encode([14, 15]), 'outstanding_courses' => json_encode([$courses[5] ?? null])], // Carryover
            ['name' => 'Jack Taylor', 'level' => 300, 'courses' => json_encode([16, 17]), 'outstanding_courses' => json_encode([$courses[6] ?? null])], // Carryover
        ];

        foreach ($students as &$student) {
            $student['id'] = Str::uuid();
        }

        foreach ($students as $student) {
            Student::create($student);
        }
    }
}
