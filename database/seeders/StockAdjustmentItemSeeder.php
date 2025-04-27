<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockAdjustmentItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stock_adjustment_items')->insert([
            [
                'adjustment_id' => 1,
                'product_id' => 1,
                'stock' => 'Product A',
                'code' => 'A001',
                'quantity' => '10',
                'type' => 'increase',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'adjustment_id' => 1,
                'product_id' => 2,
                'stock' => 'Product B',
                'code' => 'B002',
                'quantity' => '5',
                'type' => 'decrease',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
