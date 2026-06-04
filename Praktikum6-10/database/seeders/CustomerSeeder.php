<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'name' => 'Alya Pratama',
                'email' => 'alya@example.com',
                'phone' => '081234567890',
                'address' => 'Jalan Merdeka No. 12, Jakarta',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Budi Santoso',
                'email' => 'budi@example.com',
                'phone' => '082345678901',
                'address' => 'Jalan Mawar No. 9, Bandung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Citra Dewi',
                'email' => 'citra@example.com',
                'phone' => '083456789012',
                'address' => 'Jalan Melati No. 7, Surabaya',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
