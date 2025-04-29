<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaleReturnItemsSeeder extends Seeder
{
    public function run()
    {
        foreach (range(1, 20) as $i) {
            DB::table('sale_return_items')->insert([
                'sale_return_id' => rand(1, 10),
                'product_name' => 'Returned Product ' . rand(1, 10),
                'stock' => rand(5, 30),
                'quantity' => rand(1, 5),
                'net_unit_price' => rand(15, 80),
                'discount' => rand(0, 5),
                'tax' => rand(1, 10),
                'subtotal' => rand(50, 400),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

