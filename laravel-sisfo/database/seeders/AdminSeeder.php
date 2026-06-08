<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new \App\Models\User();
        $admin->username = 'admin';
        $admin->name = 'Admin Aplikasi';
        $admin->email = "admin@sisfo.com";
        $admin->level = json_encode(["ADMIN"]);
        $admin->password = \Hash::make("12345678"); 
       
        $admin->save();

        $this->command->info('User admin berhasil ditambahkan!');
    }
}
