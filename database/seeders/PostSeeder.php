<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'title' => 'Getting Started with Laravel 10',
                'text' => 'Laravel 10 makes web development faster and more enjoyable. 
                          Explore routing, controllers, migrations, and project structure.',
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Understanding Database Migrations',
                'text' => 'Migrations in Laravel allow you to manage your database structure using PHP code.',
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Why Clean Code Matters',
                'text' => 'Writing clean code improves readability, reduces bugs, and makes collaboration easier.',
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}