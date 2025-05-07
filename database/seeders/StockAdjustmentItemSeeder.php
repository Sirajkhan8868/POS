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
                'stock' => 10,  // Assuming stock is a numeric value
                'code' => 'P-1001',
                'quantity' => 10,  // Assuming quantity is a numeric value
                'type' => 'increase',
                'warehouse_name' => 'Warehouse A',  // New column for storing warehouse name
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'adjustment_id' => 2,
                'product_id' => 2,
                'stock' => 5,  // Assuming stock is a numeric value
                'code' => 'P-1002',
                'quantity' => 5,  // Assuming quantity is a numeric value
                'type' => 'decrease',
                'warehouse_name' => 'Warehouse B',  // New column for storing warehouse name
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
