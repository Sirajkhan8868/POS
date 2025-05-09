<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'customer_name' => 'Ali Khan',
                'email' => 'ali.khan@example.com',
                'phone' => '03001234567',
                'address' => 'Lahore, Pakistan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
