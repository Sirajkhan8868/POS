<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfitLossSeeder extends Seeder
{
    public function run()
    {
        DB::table('profit_losses')->insert([
            [
                'sale_id'           => 1,
                'sale_return_id'    => null,
                'purchase_id'       => 1,
                'purchase_return_id'=> null,
                'start_date'        => '2025-04-01',
                'end_date'          => '2025-04-30',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'sale_id'           => null,
                'sale_return_id'    => 1,
                'purchase_id'       => null,
                'purchase_return_id'=> 1,
                'start_date'        => '2025-04-01',
                'end_date'          => '2025-04-30',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'sale_id'           => 2,
                'sale_return_id'    => null,
                'purchase_id'       => 2,
                'purchase_return_id'=> null,
                'start_date'        => '2025-05-01',
                'end_date'          => '2025-05-31',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'sale_id'           => null,
                'sale_return_id'    => null,
                'purchase_id'       => null,
                'purchase_return_id'=> 2,
                'start_date'        => '2025-05-01',
                'end_date'          => '2025-05-31',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ]);
    }
}
