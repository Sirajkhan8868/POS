<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'customer_name' => 'Alice Johnson',
                'email' => 'alice@example.com',
                'phone' => '123-456-7890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'customer_name' => 'Bob Smith',
                'email' => 'bob@example.com',
                'phone' => '987-654-3210',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'customer_name' => 'Charlie Brown',
                'email' => 'charlie@example.com',
                'phone' => '555-666-7777',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
