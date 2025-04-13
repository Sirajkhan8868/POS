<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SaleReportsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('sale_reports')->insert([
            [
                'start_date' => '2024-01-01',
                'end_date' => '2024-01-31',
                'customer_id' => 1,
                'status' => 'completed',
                'payment_status' => 'paid',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'start_date' => '2024-02-01',
                'end_date' => '2024-02-28',
                'customer_id' => 2,
                'status' => 'pending',
                'payment_status' => 'partial',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'start_date' => '2024-03-01',
                'end_date' => '2024-03-31',
                'customer_id' => null,
                'status' => 'cancelled',
                'payment_status' => 'unpaid',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
