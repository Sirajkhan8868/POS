<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PurchaseReturnReportsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('purchase_return_reports')->insert([
            [
                'supplier_id' => 1,
                'reference' => 'PRR-1001',
                'date' => '2024-04-01',
                'total_amount' => 800.00,
                'status' => 'approved',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'supplier_id' => 2,
                'reference' => 'PRR-1002',
                'date' => '2024-04-03',
                'total_amount' => 450.00,
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'supplier_id' => 3,
                'reference' => 'PRR-1003',
                'date' => '2024-04-05',
                'total_amount' => 1000.00,
                'status' => 'rejected',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
