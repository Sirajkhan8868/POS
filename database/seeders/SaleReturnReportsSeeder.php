<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SaleReturnReportsSeeder extends Seeder
{
    public function run()
    {
        $customerIds = DB::table('customers')->pluck('id')->toArray();

        foreach (range(1, 5) as $i) {
            DB::table('sale_return_reports')->insert([
                'start_date'      => Carbon::now()->subDays(rand(15, 30)),
                'end_date'        => Carbon::now()->subDays(rand(1, 14)),
                'customer_id'     => $customerIds[array_rand($customerIds)] ?? null,
                'status'          => ['pending', 'completed', 'cancelled'][rand(0, 2)],
                'payment_status'  => ['unpaid', 'partial', 'paid'][rand(0, 2)],
                'created_at'      => now(),
                'updated_at'      => now(),
            ]);
        }
    }
}
