<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Major;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $students = [
            [
                'nim' => '20210001',
                'name' => 'Ahmad Rizki',
                'address' => 'Jl. Merdeka No. 1',
                'major_id' => 1
            ],
            [
                'nim' => '20210002',
                'name' => 'Siti Nurhaliza',
                'address' => 'Jl. Sudirman No. 15',
                'major_id' => 1
            ],
            [
                'nim' => '20210003',
                'name' => 'Budi Santoso',
                'address' => 'Jl. Pahlawan No. 8',
                'major_id' => 2
            ],
            [
                'nim' => '20210004',
                'name' => 'Dewi Kartika',
                'address' => 'Jl. Diponegoro No. 22',
                'major_id' => 2
            ],
            [
                'nim' => '20210005',
                'name' => 'Eko Prasetyo',
                'address' => 'Jl. Gatot Subroto No. 11',
                'major_id' => 3
            ],
        ];

        foreach ($students as $studentData) {

            $student = Student::create($studentData);

            $subjects = Subject::inRandomOrder()
                ->take(rand(2, 4))
                ->pluck('id');

            $student->subjects()->attach($subjects);
        }
    }
}