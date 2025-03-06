<?php

use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TimetableController;
use Illuminate\Support\Facades\Route;

Route::get('/timetable/generate', [TimetableController::class, 'generateTimetable']);
Route::get('/timetable', [TimetableController::class, 'getTimetable']);

Route::get('/lecturers', [ScheduleController::class, 'getLecturers']);
Route::get('/courses', [ScheduleController::class, 'getCourses']);
Route::get('/classrooms', [ScheduleController::class, 'getClassrooms']);
Route::get('/time_slots', [ScheduleController::class, 'getTimeSlots']);
Route::get('/enrollments', [TimetableController::class, 'getStudentEnrollments']);
