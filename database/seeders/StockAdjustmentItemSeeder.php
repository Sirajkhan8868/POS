<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockAdjustmentItemsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('stock_adjustment_items')->insert([
            [
                'adjustment_id' => 1,
                'product_id' => 1,
                'stock' => 'Warehouse A',
                'code' => 'ITEM001',
                'quantity' => 10,
                'type' => 'increase',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'adjustment_id' => 1,
                'product_id' => 2,
                'stock' => 'Warehouse A',
                'code' => 'ITEM002',
                'quantity' => 5,
                'type' => 'decrease',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'adjustment_id' => 2,
                'product_id' => 3,
                'stock' => 'Warehouse B',
                'code' => 'ITEM003',
                'quantity' => 7,
                'type' => 'increase',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
