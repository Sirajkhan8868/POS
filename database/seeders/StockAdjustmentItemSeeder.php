<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockAdjustmentItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stock_adjustment_items')->insert([
            [
                'adjustment_id' => 1,
                'product_id' => 1,
                'stock' => 'Warehouse A',
                'code' => 'P-1001',
                'quantity' => '10',
                'type' => 'increase',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'adjustment_id' => 2,
                'product_id' => 2,
                'stock' => 'Warehouse B',
                'code' => 'P-1002',
                'quantity' => '5',
                'type' => 'decrease',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
