<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SaleReportItemsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('sale_report_items')->insert([
            [
                'sale_report_id' => 1,
                'date' => '2024-01-15',
                'reference' => 'SRR-1001',
                'sale_id' => 1,
                'status' => 'received',
                'total' => 1000.00,
                'paid' => 1000.00,
                'due' => 0.00,
                'payment_status' => 'paid',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'sale_report_id' => 2,
                'date' => '2024-02-20',
                'reference' => 'SRR-1002',
                'sale_id' => 2,
                'status' => 'pending',
                'total' => 1500.00,
                'paid' => 500.00,
                'due' => 1000.00,
                'payment_status' => 'partial',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'sale_report_id' => 3,
                'date' => '2024-03-10',
                'reference' => 'SRR-1003',
                'sale_id' => 3,
                'status' => 'returned',
                'total' => 800.00,
                'paid' => 0.00,
                'due' => 800.00,
                'payment_status' => 'unpaid',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
