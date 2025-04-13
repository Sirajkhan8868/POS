<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SaleItemsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('sale_items')->insert([
            [
                'sale_id' => 1,
                'product_name' => 'Product A',
                'stock' => 100,
                'quantity' => 2,
                'net_unit_price' => 50.00,
                'discount' => 5.00,
                'tax' => 7.50,
                'subtotal' => 90.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'sale_id' => 1,
                'product_name' => 'Product B',
                'stock' => 50,
                'quantity' => 1,
                'net_unit_price' => 30.00,
                'discount' => 3.00,
                'tax' => 4.50,
                'subtotal' => 31.50,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'sale_id' => 2,
                'product_name' => 'Product C',
                'stock' => 200,
                'quantity' => 3,
                'net_unit_price' => 20.00,
                'discount' => 2.00,
                'tax' => 3.00,
                'subtotal' => 58.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'sale_id' => 3,
                'product_name' => 'Product D',
                'stock' => 150,
                'quantity' => 5,
                'net_unit_price' => 15.00,
                'discount' => 1.50,
                'tax' => 2.25,
                'subtotal' => 71.50,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
