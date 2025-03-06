<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lecturer;
use Illuminate\Support\Str;

class LecturerSeeder extends Seeder
{
    public function run()
    {
        $lecturers = [
            ['name' => 'Dr. Smith', 'department' => 'Mathematics', 'availability' => json_encode(['Monday', 'Wednesday'])],
            ['name' => 'Prof. John', 'department' => 'Physics', 'availability' => json_encode(['Tuesday', 'Thursday'])],
            ['name' => 'Dr. Adams', 'department' => 'Computer Science', 'availability' => json_encode(['Monday', 'Friday'])],
            ['name' => 'Dr. Lisa Brown', 'department' => 'Mathematics', 'availability' => json_encode(['Tuesday', 'Thursday'])],
            ['name' => 'Prof. Robert White', 'department' => 'Physics', 'availability' => json_encode(['Monday', 'Wednesday'])],
            ['name' => 'Dr. Emily Clark', 'department' => 'Computer Science', 'availability' => json_encode(['Thursday', 'Friday'])],
            ['name' => 'Dr. Kevin Johnson', 'department' => 'Electrical Engineering', 'availability' => json_encode(['Monday', 'Wednesday'])],
            ['name' => 'Prof. Susan Green', 'department' => 'Biology', 'availability' => json_encode(['Tuesday', 'Thursday'])],
            ['name' => 'Dr. Mark Williams', 'department' => 'Business Administration', 'availability' => json_encode(['Monday', 'Friday'])],
            ['name' => 'Prof. Angela Taylor', 'department' => 'Economics', 'availability' => json_encode(['Wednesday', 'Friday'])],
            ['name' => 'Dr. James Wilson', 'department' => 'Law', 'availability' => json_encode(['Monday', 'Thursday'])],
            ['name' => 'Prof. Sophia Anderson', 'department' => 'Medicine', 'availability' => json_encode(['Tuesday', 'Friday'])],
            ['name' => 'Dr. Richard Evans', 'department' => 'Mathematics', 'availability' => json_encode(['Monday', 'Thursday'])],
            ['name' => 'Dr. Olivia Martinez', 'department' => 'Physics', 'availability' => json_encode(['Tuesday', 'Wednesday'])],
            ['name' => 'Dr. Nathan Hall', 'department' => 'Computer Science', 'availability' => json_encode(['Thursday', 'Friday'])],
            ['name' => 'Dr. Daniel Scott', 'department' => 'Electrical Engineering', 'availability' => json_encode(['Monday', 'Tuesday'])],
            ['name' => 'Dr. Jessica Robinson', 'department' => 'Biology', 'availability' => json_encode(['Wednesday', 'Thursday'])],
            ['name' => 'Prof. Thomas Carter', 'department' => 'Business Administration', 'availability' => json_encode(['Monday', 'Friday'])],
            ['name' => 'Dr. Karen Lewis', 'department' => 'Economics', 'availability' => json_encode(['Tuesday', 'Thursday'])],
            ['name' => 'Dr. Eric Young', 'department' => 'Law', 'availability' => json_encode(['Wednesday', 'Friday'])],
            ['name' => 'Dr. Amanda King', 'department' => 'Medicine', 'availability' => json_encode(['Monday', 'Tuesday'])],
            ['name' => 'Dr. Brian Allen', 'department' => 'Mathematics', 'availability' => json_encode(['Thursday', 'Friday'])],
            ['name' => 'Prof. Megan Scott', 'department' => 'Physics', 'availability' => json_encode(['Monday', 'Wednesday'])],
            ['name' => 'Dr. Steven Baker', 'department' => 'Computer Science', 'availability' => json_encode(['Tuesday', 'Thursday'])],
            ['name' => 'Dr. Rebecca Gonzalez', 'department' => 'Electrical Engineering', 'availability' => json_encode(['Wednesday', 'Friday'])],
            ['name' => 'Prof. Jason Rodriguez', 'department' => 'Biology', 'availability' => json_encode(['Monday', 'Thursday'])],
            ['name' => 'Dr. Cynthia Hernandez', 'department' => 'Business Administration', 'availability' => json_encode(['Tuesday', 'Friday'])],
            ['name' => 'Dr. Kevin Perez', 'department' => 'Economics', 'availability' => json_encode(['Wednesday', 'Thursday'])],
            ['name' => 'Dr. Linda Nelson', 'department' => 'Law', 'availability' => json_encode(['Monday', 'Wednesday'])],
            ['name' => 'Prof. Charles Campbell', 'department' => 'Medicine', 'availability' => json_encode(['Tuesday', 'Thursday'])],
        ];

        foreach ($lecturers as &$lecturer) {
            $lecturer['id'] = Str::uuid();
        }

        Lecturer::insert($lecturers);
    }
}
