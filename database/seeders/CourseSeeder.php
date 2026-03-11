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
            ['course_code' => 'IT101',   'course_name' => 'Introduction to Computing',        'capacity' => 40],
            ['course_code' => 'IT102',   'course_name' => 'Computer Programming 1',            'capacity' => 40],
            ['course_code' => 'IT103',   'course_name' => 'Computer Programming 2',            'capacity' => 40],
            ['course_code' => 'IT201',   'course_name' => 'Data Structures and Algorithms',    'capacity' => 35],
            ['course_code' => 'IT202',   'course_name' => 'Database Management Systems',       'capacity' => 35],
            ['course_code' => 'IT203',   'course_name' => 'Web Development 1',                 'capacity' => 35],
            ['course_code' => 'IT301',   'course_name' => 'Software Engineering',              'capacity' => 30],
            ['course_code' => 'IT302',   'course_name' => 'Networking Fundamentals',           'capacity' => 30],
            // BSCS
            ['course_code' => 'CS101',   'course_name' => 'Discrete Mathematics',              'capacity' => 40],
            ['course_code' => 'CS102',   'course_name' => 'Introduction to Programming',       'capacity' => 40],
            ['course_code' => 'CS201',   'course_name' => 'Algorithm Design',                  'capacity' => 35],
            ['course_code' => 'CS301',   'course_name' => 'Operating Systems',                 'capacity' => 30],
            // BSIS
            ['course_code' => 'IS101',   'course_name' => 'Fundamentals of IS',                'capacity' => 40],
            ['course_code' => 'IS201',   'course_name' => 'Systems Analysis & Design',         'capacity' => 35],
            ['course_code' => 'IS301',   'course_name' => 'Enterprise Resource Planning',      'capacity' => 30],
            // DICT
            ['course_code' => 'DICT101', 'course_name' => 'ICT Fundamentals',                  'capacity' => 45],
            ['course_code' => 'DICT102', 'course_name' => 'Computer Maintenance',              'capacity' => 40],
            ['course_code' => 'DICT201', 'course_name' => 'Network Installation',              'capacity' => 35],
            // BSECE
            ['course_code' => 'ECE101',  'course_name' => 'Engineering Mathematics',           'capacity' => 40],
            ['course_code' => 'ECE201',  'course_name' => 'Electronics Circuits',              'capacity' => 35],
            // General Education
            ['course_code' => 'GE001',   'course_name' => 'Purposive Communication',           'capacity' => 50],
            ['course_code' => 'GE002',   'course_name' => 'Mathematics in the Modern World',   'capacity' => 50],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}