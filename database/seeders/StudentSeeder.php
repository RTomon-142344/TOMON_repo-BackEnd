<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use Carbon\Carbon;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Student::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $firstNames = [
            'Maria','Jose','Juan','Ana','Carlo','Rosa','Miguel','Sofia',
            'Luis','Clara','Rafael','Isabel','Antonio','Carmen','Pedro',
            'Luz','Ramon','Elena','Eduardo','Nora','Andres','Patricia',
            'Manuel','Lourdes','Ricardo','Gloria','Fernando','Cecilia',
            'Mario','Dolores','Alfonso','Pilar','Roberto','Teresa','Jorge',
            'Monica','Alberto','Esperanza','Francisco','Amparo','James',
            'John','Mary','David','Sarah','Michael','Jennifer','Robert',
            'Linda','William','Barbara','Richard','Susan','Joseph','Jessica',
            'Ryan','Ashley','Kevin','Amanda','Brian','Melissa',
        ];

        $lastNames = [
            'Santos','Reyes','Cruz','Bautista','Ocampo','Garcia','Mendoza',
            'Torres','Ramos','Flores','De Leon','Castillo','Dela Cruz',
            'Gonzales','Lopez','Hernandez','Perez','Ramirez','Martinez',
            'Rodriguez','Villanueva','Pascual','Aquino','Espiritu','Navarro',
            'Morales','Domingo','Aguilar','Magno','Soriano','Delos Santos',
            'Miranda','Robles','Alvarez','Santiago','Macaraeg','Tolentino',
            'Dizon','Fernandez','Catalan','Smith','Johnson','Williams',
            'Brown','Jones','Miller','Davis','Wilson','Moore','Taylor',
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

        for ($i = 1; $i <= 500; $i++) {
            $firstName = $firstNames[array_rand($firstNames)];
            $lastName  = $lastNames[array_rand($lastNames)];

            Student::create([
                'student_number' => 'STU-' . str_pad($i, 5, '0', STR_PAD_LEFT),
                'first_name'     => $firstName,
                'last_name'      => $lastName,
                'email'          => strtolower($firstName . '.' . $lastName . $i . '@acadportal.edu'),
                'gender'         => $genders[array_rand($genders)],
                'department'     => $departments[array_rand($departments)],
                'enrolled_at'    => Carbon::createFromTimestamp(
                    rand($startDate->timestamp, $endDate->timestamp)
                )->toDateString(),
            ]);
        }
    }
}