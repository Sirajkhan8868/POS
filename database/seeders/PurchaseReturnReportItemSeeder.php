<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PurchaseReturnReportItemsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('purchase_return_report_items')->insert([
            [
                'purchase_return_report_id' => 1,
                'date' => '2024-04-01',
                'reference' => 'PRR-1001-ITEM1',
                'supplier_id' => 1,
                'status' => 'received',
                'total' => 500.00,
                'paid' => 500.00,
                'due' => 0.00,
                'payment_status' => 'paid',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'purchase_return_report_id' => 1,
                'date' => '2024-04-02',
                'reference' => 'PRR-1001-ITEM2',
                'supplier_id' => 2,
                'status' => 'pending',
                'total' => 300.00,
                'paid' => 150.00,
                'due' => 150.00,
                'payment_status' => 'partial',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'purchase_return_report_id' => 2,
                'date' => '2024-04-03',
                'reference' => 'PRR-1002-ITEM1',
                'supplier_id' => 3,
                'status' => 'returned',
                'total' => 450.00,
                'paid' => 0.00,
                'due' => 450.00,
                'payment_status' => 'unpaid',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
