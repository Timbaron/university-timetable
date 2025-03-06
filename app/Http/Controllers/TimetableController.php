<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\StudentEnrollments;
use App\Models\TimeSlot;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\Models\Timetable;

class TimetableController extends Controller
{
    public function generateTimetable()
    {
        $process = new Process(['python3', storage_path('app/timetable_generator.py')]);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $output = json_decode($process->getOutput(), true);

        foreach ($output as $row) {
            Timetable::create([
                'course_id' => Course::where('name', $row['course'])->first()->id,
                'lecturer_id' => Lecturer::where('name', $row['lecturer'])->first()->id,
                'classroom_id' => Classroom::where('name', $row['classroom'])->first()->id,
                'time_slot_id' => TimeSlot::where('day', explode(' ', $row['time_slot'])[0])->first()->id,
            ]);
        }

        return response()->json(['message' => 'Timetable generated successfully']);
    }

    public function getTimetable()
    {
        return response()->json(Timetable::with(['course', 'lecturer', 'classroom', 'timeSlot'])->get());
    }

    public function getCourses()
    {
        return response()->json(Course::select('id', 'name', 'prerequisite_courses')->get());
    }

    public function getTimeSlots()
    {
        return response()->json(TimeSlot::all());
    }

    public function getStudentEnrollments()
    {
        return response()->json(StudentEnrollments::with('course')->get());
    }
}
