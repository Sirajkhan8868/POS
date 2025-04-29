<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaleItemsSeeder extends Seeder
{
    public function run()
    {
        foreach (range(1, 20) as $i) {
            DB::table('sale_items')->insert([
                'sale_id' => rand(1, 10),
                'product_name' => 'Product ' . rand(1, 10),
                'stock' => rand(10, 50),
                'quantity' => rand(1, 10),
                'net_unit_price' => rand(20, 100),
                'discount' => rand(0, 10),
                'tax' => rand(5, 20),
                'subtotal' => rand(100, 500),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

