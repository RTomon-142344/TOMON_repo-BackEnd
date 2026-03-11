<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\SchoolDay;
use Carbon\Carbon;

class SchoolDaySeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        SchoolDay::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $holidays = [
            '2024-08-26' => ['type' => 'holiday', 'label' => 'National Heroes Day'],
            '2024-11-01' => ['type' => 'holiday', 'label' => "All Saints' Day"],
            '2024-11-02' => ['type' => 'holiday', 'label' => "All Souls' Day"],
            '2024-11-30' => ['type' => 'holiday', 'label' => 'Bonifacio Day'],
            '2024-12-08' => ['type' => 'holiday', 'label' => 'Immaculate Conception'],
            '2024-12-25' => ['type' => 'holiday', 'label' => 'Christmas Day'],
            '2024-12-30' => ['type' => 'holiday', 'label' => 'Rizal Day'],
            '2025-01-01' => ['type' => 'holiday', 'label' => "New Year's Day"],
            '2025-04-17' => ['type' => 'holiday', 'label' => 'Maundy Thursday'],
            '2025-04-18' => ['type' => 'holiday', 'label' => 'Good Friday'],
            '2025-05-01' => ['type' => 'holiday', 'label' => 'Labor Day'],
            '2025-06-12' => ['type' => 'holiday', 'label' => 'Independence Day'],
        ];

        $events = [
            '2024-08-15' => ['type' => 'event', 'label' => 'Enrollment Day'],
            '2024-09-05' => ['type' => 'event', 'label' => 'Foundation Day'],
            '2024-10-15' => ['type' => 'event', 'label' => 'Mid-term Exams'],
            '2024-10-16' => ['type' => 'event', 'label' => 'Mid-term Exams'],
            '2024-10-17' => ['type' => 'event', 'label' => 'Mid-term Exams'],
            '2024-12-18' => ['type' => 'event', 'label' => 'Christmas Program'],
            '2025-01-06' => ['type' => 'event', 'label' => 'Classes Resume'],
            '2025-02-14' => ['type' => 'event', 'label' => 'Valentine Social'],
            '2025-03-10' => ['type' => 'event', 'label' => 'Final Exams'],
            '2025-03-11' => ['type' => 'event', 'label' => 'Final Exams'],
            '2025-03-12' => ['type' => 'event', 'label' => 'Final Exams'],
            '2025-03-13' => ['type' => 'event', 'label' => 'Final Exams'],
            '2025-05-20' => ['type' => 'event', 'label' => 'Graduation Ceremony'],
        ];

        // Christmas break: Dec 19 – Jan 5
        $christmasBreak = [];
        $d = Carbon::create(2024, 12, 19);
        $breakEnd = Carbon::create(2025, 1, 5);
        while ($d->lte($breakEnd)) {
            $christmasBreak[$d->toDateString()] = ['type' => 'holiday', 'label' => 'Christmas Break'];
            $d->addDay();
        }

        $allSpecial = array_merge($holidays, $events, $christmasBreak);

        $current = Carbon::create(2024, 8, 1);
        $end     = Carbon::create(2025, 5, 31);

        while ($current->lte($end)) {
            $dateStr = $current->toDateString();

            if ($current->isWeekend()) {
                $current->addDay();
                continue;
            }

            if (isset($allSpecial[$dateStr])) {
                $s = $allSpecial[$dateStr];
                SchoolDay::create([
                    'date'             => $dateStr,
                    'type'             => $s['type'],
                    'label'            => $s['label'],
                    'attendance_count' => $s['type'] === 'holiday' ? 0 : rand(300, 480),
                ]);
            } else {
                $dow      = $current->dayOfWeek;
                $variance = ($dow == 1 || $dow == 5) ? rand(-40, 10) : rand(-20, 30);
                SchoolDay::create([
                    'date'             => $dateStr,
                    'type'             => 'class',
                    'label'            => null,
                    'attendance_count' => max(0, min(500, 420 + $variance)),
                ]);
            }

            $current->addDay();
        }
    }
}