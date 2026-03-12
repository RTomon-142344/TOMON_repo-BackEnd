<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Course::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $courses = [
            // BSIT
            ['course_code' => 'IT101',  'course_name' => 'Introduction to Computing',          'capacity' => 40],
            ['course_code' => 'IT102',  'course_name' => 'Computer Programming 1',             'capacity' => 40],
            ['course_code' => 'IT103',  'course_name' => 'Computer Programming 2',             'capacity' => 40],
            ['course_code' => 'IT201',  'course_name' => 'Data Structures and Algorithms',     'capacity' => 35],
            ['course_code' => 'IT202',  'course_name' => 'Web Development',                    'capacity' => 35],
            // BSCS
            ['course_code' => 'CS101',  'course_name' => 'Discrete Mathematics',               'capacity' => 40],
            ['course_code' => 'CS102',  'course_name' => 'Object-Oriented Programming',        'capacity' => 40],
            ['course_code' => 'CS201',  'course_name' => 'Algorithms and Complexity',          'capacity' => 35],
            ['course_code' => 'CS202',  'course_name' => 'Operating Systems',                  'capacity' => 35],
            // BSIS
            ['course_code' => 'IS101',  'course_name' => 'Information Systems Concepts',       'capacity' => 40],
            ['course_code' => 'IS102',  'course_name' => 'Systems Analysis and Design',        'capacity' => 40],
            ['course_code' => 'IS201',  'course_name' => 'Database Management Systems',        'capacity' => 35],
            // DICT
            ['course_code' => 'DC101',  'course_name' => 'Computer Hardware Servicing',        'capacity' => 30],
            ['course_code' => 'DC102',  'course_name' => 'Networking Fundamentals',            'capacity' => 30],
            ['course_code' => 'DC201',  'course_name' => 'Technical Documentation',            'capacity' => 30],
            // BSECE
            ['course_code' => 'ECE101', 'course_name' => 'Engineering Mathematics',            'capacity' => 40],
            ['course_code' => 'ECE102', 'course_name' => 'Electric Circuits',                  'capacity' => 40],
            ['course_code' => 'ECE201', 'course_name' => 'Electronics 1',                      'capacity' => 35],
            // GE (shared)
            ['course_code' => 'GE001',  'course_name' => 'Purposive Communication',            'capacity' => 45],
            ['course_code' => 'GE002',  'course_name' => 'Readings in Philippine History',     'capacity' => 45],
            ['course_code' => 'GE003',  'course_name' => 'Mathematics in the Modern World',    'capacity' => 45],
            ['course_code' => 'GE004',  'course_name' => 'The Contemporary World',             'capacity' => 45],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }

        $this->command->info('✅ ' . count($courses) . ' courses seeded.');
    }
}