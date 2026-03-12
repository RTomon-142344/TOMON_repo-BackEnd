<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Course;
use Carbon\Carbon;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('enrollments')->truncate();
        Student::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $firstNames = [
            'Maria','Jose','Juan','Ana','Carlo','Rosa','Miguel','Sofia',
            'Luis','Clara','Rafael','Isabel','Antonio','Carmen','Pedro',
            'Luz','Ramon','Elena','Eduardo','Nora','Andres','Patricia',
            'Manuel','Lourdes','Ricardo','Gloria','Fernando','Cecilia',
            'Mario','Dolores','Alfonso','Pilar','Roberto','Teresa','Jorge',
            'Monica','Alberto','Esperanza','Francisco','Amparo','Angelo',
            'Kristine','Mark','Joanna','Ryan','Angelica','Dennis','Sheila',
            'Ronald','Maricel','Roel','Jasmine','Kevin','Hannah','Brian',
            'Melissa','Anthony','Christine','Daniel','Precious','John',
            'Mary','David','Sarah','Michael','Jennifer','Robert','Linda',
            'William','Barbara','Richard','Susan','Joseph','Jessica',
            'Ashley','Amanda','Joshua','Stephanie','James','Nicole',
            'Christopher','Elizabeth','Matthew','Margaret','Andrew','Sandra',
            'Liezl','Rhea','Gina','Alma','Marites','Rowena','Irene',
            'Aileen','Liezel','Jomar','Renz','Aldrin','Marvin','Jayson',
            'Hazel','Trisha','Camille','Janine','Carla','Mylene','Vivian',
        ];

        $lastNames = [
            'Santos','Reyes','Cruz','Bautista','Ocampo','Garcia','Mendoza',
            'Torres','Ramos','Flores','De Leon','Castillo','Dela Cruz',
            'Gonzales','Lopez','Hernandez','Perez','Ramirez','Martinez',
            'Rodriguez','Villanueva','Pascual','Aquino','Espiritu','Navarro',
            'Morales','Domingo','Aguilar','Magno','Soriano','Delos Santos',
            'Miranda','Robles','Alvarez','Santiago','Macaraeg','Tolentino',
            'Dizon','Fernandez','Catalan','Lim','Tan','Uy','Co','Sy',
            'Chua','Go','Ng','Chan','Dela Torre','De Guzman',
            'Del Rosario','Evangelista','Manalo','Mercado',
            'Salazar','Gregorio','Enriquez','Padilla','Cabrera','Rivera',
            'Medina','Guerrero','Vargas','Jimenez','Molina','Valdez',
            'Catacutan','Abella','Abad','Abalos','Abante','Abaya',
            'Buenaventura','Caballero','Calibo','Dacanay','Dalisay',
            'Encarnacion','Factora','Galapon','Galon','Halili','Ilagan',
        ];

        $departments = [
            'BSIT','BSIT','BSIT',
            'BSCS','BSCS',
            'BSIS',
            'DICT','DICT',
            'BSECE',
        ];

        $genders   = ['Male', 'Female'];
        $startDate = Carbon::create(2024, 8, 1);
        $endDate   = Carbon::create(2025, 7, 31);

        // Get all course IDs once
        $courseIds = Course::pluck('id')->toArray();

        if (empty($courseIds)) {
            $this->command->warn('⚠️  No courses found! Run CourseSeeder first.');
            return;
        }

        for ($i = 1; $i <= 500; $i++) {
            $firstName  = $firstNames[array_rand($firstNames)];
            $lastName   = $lastNames[array_rand($lastNames)];
            $department = $departments[array_rand($departments)];
            $gender     = $genders[array_rand($genders)];

            $enrolledAt = Carbon::createFromTimestamp(
                rand($startDate->timestamp, $endDate->timestamp)
            )->toDateString();

            $cleanFirst = preg_replace('/[\s]+/', '', strtolower($firstName));
            $cleanLast  = preg_replace('/[\s]+/', '', strtolower($lastName));

            $student = Student::create([
                'student_number' => 'STU-' . str_pad($i, 5, '0', STR_PAD_LEFT),
                'first_name'     => $firstName,
                'last_name'      => $lastName,
                'email'          => "{$cleanFirst}.{$cleanLast}{$i}@acadportal.edu",
                'gender'         => $gender,
                'department'     => $department,
                'enrolled_at'    => $enrolledAt,
            ]);

            // Enroll in 1–4 random courses (no duplicates)
            $picked = collect($courseIds)->shuffle()->take(rand(1, 4));
            foreach ($picked as $courseId) {
                DB::table('enrollments')->insert([
                    'student_id' => $student->id,
                    'course_id'  => $courseId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        $total = DB::table('enrollments')->count();
        $this->command->info("✅ 500 students seeded with {$total} total enrollments.");
    }
}