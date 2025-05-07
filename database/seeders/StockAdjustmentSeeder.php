<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockAdjustmentSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('stock_adjustments')->insert([
            [
                'reference' => 'ADJ-001',
                'date' => now(),
                'note' => 'Initial stock adjustment',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'reference' => 'ADJ-002',
                'date' => now(),
                'note' => 'Stock loss adjustment',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
