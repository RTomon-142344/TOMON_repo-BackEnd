<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run()
    {
        Student::create([
            'student_number' => '142344',
            'first_name' => 'Rainier',
            'last_name' => 'Tomon',
            'email' => 'rainiertomon@example.com',
        ]);

        Student::create([
            'student_number' => '124532',
            'first_name' => 'John',
            'last_name' => 'Lenon',
            'email' => 'john.lenon@example.com',
        ]);

        Student::create([
            'student_number' => '145634',
            'first_name' => 'Kanye',
            'last_name' => 'West',
            'email' => 'kanyewest1@example.com',
        ]);
    }
}
