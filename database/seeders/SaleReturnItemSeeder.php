<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SaleReturnItemsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('sale_return_items')->insert([
            [
                'sale_return_id' => 1,
                'product_name' => 'Product A',
                'stock' => 10,
                'quantity' => 2,
                'net_unit_price' => 100.00,
                'discount' => 10.00,
                'tax' => 5.00,
                'subtotal' => 190.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'sale_return_id' => 2,
                'product_name' => 'Product B',
                'stock' => 20,
                'quantity' => 1,
                'net_unit_price' => 50.00,
                'discount' => 5.00,
                'tax' => 3.00,
                'subtotal' => 48.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'sale_return_id' => 3,
                'product_name' => 'Product C',
                'stock' => 15,
                'quantity' => 3,
                'net_unit_price' => 150.00,
                'discount' => 20.00,
                'tax' => 15.00,
                'subtotal' => 405.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
