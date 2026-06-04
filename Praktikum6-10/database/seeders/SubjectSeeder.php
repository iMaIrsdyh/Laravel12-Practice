<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        $subjects = [
            ['name' => 'Pemrograman Web', 'sks' => 3],
            ['name' => 'Database', 'sks' => 3],
            ['name' => 'Algoritma', 'sks' => 2],
            ['name' => 'Jaringan Komputer', 'sks' => 3],
            ['name' => 'Sistem Operasi', 'sks' => 2],
        ];

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }
    }
}