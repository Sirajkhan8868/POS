<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PurchaseReportItemsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('purchase_report_items')->insert([
            [
                'purchase_report_id' => 1,
                'date' => '2024-01-15',
                'reference' => 'PR-1001',
                'supplier_id' => 1,
                'status' => 'received',
                'total' => 1500.00,
                'paid' => 1500.00,
                'due' => 0.00,
                'payment_status' => 'paid',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'purchase_report_id' => 1,
                'date' => '2024-01-20',
                'reference' => 'PR-1002',
                'supplier_id' => 2,
                'status' => 'pending',
                'total' => 2200.00,
                'paid' => 1200.00,
                'due' => 1000.00,
                'payment_status' => 'partial',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'purchase_report_id' => 2,
                'date' => '2024-02-10',
                'reference' => 'PR-1003',
                'supplier_id' => 2,
                'status' => 'returned',
                'total' => 980.00,
                'paid' => 0.00,
                'due' => 980.00,
                'payment_status' => 'unpaid',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
