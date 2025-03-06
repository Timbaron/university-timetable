<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TimeSlot;
use Illuminate\Support\Str;

class TimeSlotSeeder extends Seeder
{
    public function run()
    {
        $timeSlots = [
            ['day' => 'Monday', 'start_time' => '08:00:00', 'end_time' => '10:00:00'],
            ['day' => 'Monday', 'start_time' => '10:00:00', 'end_time' => '12:00:00'],
            ['day' => 'Monday', 'start_time' => '01:00:00', 'end_time' => '03:00:00'],

            ['day' => 'Tuesday', 'start_time' => '09:00:00', 'end_time' => '11:00:00'],
            ['day' => 'Tuesday', 'start_time' => '11:00:00', 'end_time' => '01:00:00'],

            ['day' => 'Wednesday', 'start_time' => '08:00:00', 'end_time' => '10:00:00'],
            ['day' => 'Wednesday', 'start_time' => '10:00:00', 'end_time' => '12:00:00'],
            ['day' => 'Wednesday', 'start_time' => '02:00:00', 'end_time' => '04:00:00'],

            ['day' => 'Thursday', 'start_time' => '09:00:00', 'end_time' => '11:00:00'],
            ['day' => 'Thursday', 'start_time' => '11:00:00', 'end_time' => '01:00:00'],

            ['day' => 'Friday', 'start_time' => '08:00:00', 'end_time' => '10:00:00'],
            ['day' => 'Friday', 'start_time' => '10:00:00', 'end_time' => '12:00:00'],
            ['day' => 'Friday', 'start_time' => '01:00:00', 'end_time' => '03:00:00'],
        ];

        foreach ($timeSlots as $timeSlot) {
            TimeSlot::firstOrCreate([
                'id' => Str::uuid(),
                'day' => $timeSlot['day'],
                'start_time' => $timeSlot['start_time'],
                'end_time' => $timeSlot['end_time'],
            ]);
        }
    }
}
