<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name'        => 'Laptop',
                'price'       => 7000000,
                'description' => 'Laptop untuk pemrograman',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'name'        => 'Mouse',
                'price'       => 150000,
                'description' => 'Mouse wireless',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'name'        => 'Keyboard',
                'price'       => 250000,
                'description' => 'Keyboard mechanical',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ]);
    }
}