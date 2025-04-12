<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class StockAdjustmentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('stock_adjustments')->insert([
            [
                'reference' => 'REF-1001',
                'date' => Carbon::now()->subDays(2)->toDateString(),
                'note' => 'Initial stock adjustment',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'reference' => 'REF-1002',
                'date' => Carbon::now()->subDay()->toDateString(),
                'note' => 'Monthly stock check',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
