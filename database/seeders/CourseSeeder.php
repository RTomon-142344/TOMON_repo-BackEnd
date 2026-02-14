<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run()
    {
        Course::create([
            'course_code' => '4532',
            'course_name' => 'Mathematics in the Modern World',
            'capacity' => 50,
        ]);

        Course::create([
            'course_code' => '3265',
            'course_name' => 'College Physics',
            'capacity' => 50,
        ]);

        Course::create([
            'course_code' => '5410',
            'course_name' => 'Introduction to Programming',
            'capacity' => 50,
        ]);
    }
}
