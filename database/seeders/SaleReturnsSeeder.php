<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SaleReturnsSeeder extends Seeder
{
    public function run()
    {
        $customerIds = DB::table('customers')->pluck('id')->toArray();
        $productIds = DB::table('products')->pluck('id')->toArray();

        if (empty($customerIds) || empty($productIds)) {
            $this->command->warn('Missing customers or products. Skipping SaleReturnsSeeder.');
            return;
        }

        foreach (range(1, 10) as $i) {
            DB::table('sale_returns')->insert([
                'reference'     => 'RET-' . strtoupper(Str::random(6)),
                'customer_id'   => $customerIds[array_rand($customerIds)],
                'product_id'    => $productIds[array_rand($productIds)],
                'date'          => Carbon::now()->subDays(rand(1, 30)),
                'tax'           => rand(1, 10),
                'discount'      => rand(0, 15),
                'shipping'      => rand(0, 20),
                'total_amount'  => rand(100, 1000),
                'status'        => ['Pending', 'Approved', 'Rejected'][rand(0, 2)],
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }
    }
}
