<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarcodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('barcodes')->insert([
            [
                'product_name' => 'Wireless Mouse',
                'product_code' => 'WM-1001',
                'quantity' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Mechanical Keyboard',
                'product_code' => 'MK-2002',
                'quantity' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'USB-C Cable',
                'product_code' => 'UC-3003',
                'quantity' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
