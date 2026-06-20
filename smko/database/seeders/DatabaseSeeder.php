<?php

namespace Database\Seeders;

use App\Models\Assignment;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin SMKO',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        $guru1 = User::create([
            'name' => 'Guru 1',
            'email' => 'guru1@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'guru',
        ]);

        $guru2 = User::create([
            'name' => 'Guru 2',
            'email' => 'guru2@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'guru',
        ]);

        $students = [];
        for ($i = 1; $i <= 5; $i++) {
            $students[] = User::create([
                'name' => "Siswa {$i}",
                'email' => "siswa{$i}@gmail.com",
                'password' => Hash::make('password'),
                'role' => 'siswa',
            ]);
        }

        $courses = collect([
            ['teacher' => $guru1, 'name' => 'Pemrograman Web', 'code' => 'WEB101', 'description' => 'Belajar HTML, CSS, dan PHP.'],
            ['teacher' => $guru1, 'name' => 'Basis Data', 'code' => 'DB102', 'description' => 'Konsep database relasional dan query.'],
            ['teacher' => $guru2, 'name' => 'Jaringan Komputer', 'code' => 'NET103', 'description' => 'Prinsip jaringan dan protokol.'],
        ])->map(function ($course) {
            return Course::create([
                'teacher_id' => $course['teacher']->id,
                'name' => $course['name'],
                'code' => $course['code'],
                'description' => $course['description'],
            ]);
        });

        $assignments = collect([
            ['course' => $courses[0], 'title' => 'Tugas HTML', 'description' => 'Buat halaman web sederhana.', 'due_date' => now()->addDays(7)],
            ['course' => $courses[0], 'title' => 'Tugas CSS', 'description' => 'Desain tampilan halaman menggunakan CSS.', 'due_date' => now()->addDays(10)],
            ['course' => $courses[1], 'title' => 'Tugas ERD', 'description' => 'Gambar diagram ERD untuk studi kasus.', 'due_date' => now()->addDays(8)],
            ['course' => $courses[2], 'title' => 'Tugas Topologi', 'description' => 'Jelaskan topologi jaringan pilihan.', 'due_date' => now()->addDays(9)],
            ['course' => $courses[2], 'title' => 'Tugas IP Address', 'description' => 'Hitung subnet dan alamat IP.', 'due_date' => now()->addDays(11)],
        ])->map(function ($assignment) {
            return Assignment::create([
                'course_id' => $assignment['course']->id,
                'title' => $assignment['title'],
                'description' => $assignment['description'],
                'due_date' => $assignment['due_date'],
            ]);
        });

        Enrollment::create(['student_id' => $students[0]->id, 'course_id' => $courses[0]->id, 'enrolled_at' => now()]);
        Enrollment::create(['student_id' => $students[1]->id, 'course_id' => $courses[0]->id, 'enrolled_at' => now()]);
        Enrollment::create(['student_id' => $students[2]->id, 'course_id' => $courses[1]->id, 'enrolled_at' => now()]);
        Enrollment::create(['student_id' => $students[3]->id, 'course_id' => $courses[1]->id, 'enrolled_at' => now()]);
        Enrollment::create(['student_id' => $students[4]->id, 'course_id' => $courses[2]->id, 'enrolled_at' => now()]);

        Submission::create([
            'assignment_id' => $assignments[0]->id,
            'student_id' => $students[0]->id,
            'file_path' => 'submissions/tugas_html_siswa1.pdf',
            'score' => 88,
            'submitted_at' => now()->subDay(),
        ]);

        Submission::create([
            'assignment_id' => $assignments[0]->id,
            'student_id' => $students[1]->id,
            'file_path' => 'submissions/tugas_html_siswa2.pdf',
            'score' => 91,
            'submitted_at' => now()->subDay(),
        ]);

        Submission::create([
            'assignment_id' => $assignments[1]->id,
            'student_id' => $students[0]->id,
            'file_path' => 'submissions/tugas_css_siswa1.pdf',
            'score' => 82,
            'submitted_at' => now()->subDay(),
        ]);

        Submission::create([
            'assignment_id' => $assignments[2]->id,
            'student_id' => $students[2]->id,
            'file_path' => 'submissions/tugas_erd_siswa3.pdf',
            'score' => 90,
            'submitted_at' => now()->subDay(),
        ]);

        Submission::create([
            'assignment_id' => $assignments[3]->id,
            'student_id' => $students[4]->id,
            'file_path' => 'submissions/tugas_topologi_siswa5.pdf',
            'score' => 75,
            'submitted_at' => now()->subDay(),
        ]);

        Submission::create([
            'assignment_id' => $assignments[4]->id,
            'student_id' => $students[4]->id,
            'file_path' => 'submissions/tugas_ip_siswa5.pdf',
            'score' => 84,
            'submitted_at' => now()->subDay(),
        ]);
    }
}
