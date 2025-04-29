<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SaleReportItemsSeeder extends Seeder
{
    public function run()
    {
        $reportIds = DB::table('sale_reports')->pluck('id')->toArray();
        $saleIds = DB::table('sales')->pluck('id')->toArray();

        foreach (range(1, 10) as $i) {
            DB::table('sale_report_items')->insert([
                'sale_report_id'  => $reportIds[array_rand($reportIds)],
                'date'            => Carbon::now()->subDays(rand(1, 30)),
                'reference'       => 'REF-' . strtoupper(Str::random(6)),
                'sale_id'         => $saleIds[array_rand($saleIds)],
                'status'          => ['pending', 'received', 'returned'][rand(0, 2)],
                'total'           => rand(1000, 5000),
                'paid'            => rand(500, 3000),
                'due'             => rand(0, 2000),
                'payment_status'  => ['unpaid', 'partial', 'paid'][rand(0, 2)],
                'created_at'      => now(),
                'updated_at'      => now(),
            ]);
        }
    }
}
