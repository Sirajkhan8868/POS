<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StockAdjustmentSeeder extends Seeder
{
    public function run()
    {
        $productIdA = DB::table('products')->where('product_code', 'A001')->value('id');
        $productIdB = DB::table('products')->where('product_code', 'B002')->value('id');

        $adjustmentId = DB::table('stock_adjustments')->insertGetId([
            'reference' => 'SA-' . strtoupper(uniqid()),
            'date' => Carbon::now()->format('Y-m-d'),
            'note' => 'Initial stock adjustment',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('stock_adjustment_items')->insert([
            [
                'adjustment_id' => $adjustmentId,
                'product_id' => $productIdA,
                'stock' => 'Product A',
                'code' => 'A001',
                'quantity' => 10,
                'type' => 'increase',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'adjustment_id' => $adjustmentId,
                'product_id' => $productIdB,
                'stock' => 'Product B',
                'code' => 'B002',
                'quantity' => 5,
                'type' => 'decrease',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
