<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecturer;
use App\Models\Course;
use App\Models\Classroom;
use App\Models\TimeSlot;

class ScheduleController extends Controller
{
    public function getLecturers()
    {
        return response()->json(Lecturer::pluck('name', 'id'));
    }

    public function getCourses()
    {
        return response()->json(
            Course::with('prerequisiteCourses:id,name') // Ensure prerequisites are loaded
                ->get(['id', 'name']) // Get only necessary fields
                ->mapWithKeys(function ($course) {
                    return [
                        $course->id => [
                            'name' => $course->name,
                            'prerequisite_courses' => $course->prerequisiteCourses->pluck('id')->toArray()
                        ]
                    ];
                })
        );
    }

    public function getClassrooms()
    {
        return response()->json(Classroom::pluck('name', 'id'));
    }

    public function getTimeSlots()
    {
        $timeSlots = TimeSlot::all()->mapWithKeys(function ($slot) {
            return [
                $slot->id => "{$slot->day} {$slot->start_time}-{$slot->end_time}"
            ];
        });

        return response()->json($timeSlots);
    }
}
