<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('mahasiswas')->insert([
            [
                'nim' => '2210101001',
                'nama' => 'Budi Santoso',
                'jurusan' => 'Teknik Informatika',
                'email' => 'budi@example.com',
                'angkatan' => 2022,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nim' => '2210101002',
                'nama' => 'Siti Rahayu',
                'jurusan' => 'Sistem Informasi',
                'email' => 'siti@example.com',
                'angkatan' => 2022,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nim' => '2210101003',
                'nama' => 'Andi Wijaya',
                'jurusan' => 'Teknik Informatika',
                'email' => 'andi@example.com',
                'angkatan' => 2022,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
