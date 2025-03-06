<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Classroom;
use Illuminate\Support\Str;


class ClassroomSeeder extends Seeder
{
    public function run()
    {
        $classrooms = [
            ['name' => 'Room A', 'capacity' => 50],
            ['name' => 'Room B', 'capacity' => 100],
            ['name' => 'Room C', 'capacity' => 80],
            ['name' => 'Room D', 'capacity' => 120],
            ['name' => 'Room E', 'capacity' => 60],
            ['name' => 'Room F', 'capacity' => 200],
            ['name' => 'Room G', 'capacity' => 150],
            ['name' => 'Room H', 'capacity' => 90],
            ['name' => 'Room I', 'capacity' => 110],
            ['name' => 'Room J', 'capacity' => 75],
            ['name' => 'Room K', 'capacity' => 130],
            ['name' => 'Room L', 'capacity' => 140],
            ['name' => 'Room M', 'capacity' => 70],
            ['name' => 'Room N', 'capacity' => 85],
            ['name' => 'Room O', 'capacity' => 95],
            ['name' => 'Room P', 'capacity' => 160],
            ['name' => 'Room Q', 'capacity' => 180],
            ['name' => 'Room R', 'capacity' => 55],
            ['name' => 'Room S', 'capacity' => 45],
            ['name' => 'Room T', 'capacity' => 35],
            ['name' => 'Room U', 'capacity' => 125],
            ['name' => 'Room V', 'capacity' => 105],
            ['name' => 'Room W', 'capacity' => 170],
            ['name' => 'Room X', 'capacity' => 90],
            ['name' => 'Room Y', 'capacity' => 65],
            ['name' => 'Room Z', 'capacity' => 155],
            ['name' => 'Auditorium 1', 'capacity' => 500],
            ['name' => 'Auditorium 2', 'capacity' => 600],
            ['name' => 'Lecture Hall 1', 'capacity' => 250],
            ['name' => 'Lecture Hall 2', 'capacity' => 300],
            ['name' => 'Lab 1', 'capacity' => 40],
            ['name' => 'Lab 2', 'capacity' => 50],
            ['name' => 'Lab 3', 'capacity' => 60],
        ];

        foreach ($classrooms as &$classroom) {
            $classroom['id'] = Str::uuid();
        }

        Classroom::insert($classrooms);
    }
}
