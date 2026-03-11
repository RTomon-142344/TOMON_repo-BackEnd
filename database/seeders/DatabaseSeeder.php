<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            StudentSeeder::class,
            CourseSeeder::class,
            SchoolDaySeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
            UserSeeder::class,
        ]);
    }
}