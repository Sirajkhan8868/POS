<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PurchaseReturnItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('purchase_return_items')->insert([
            [
                'purchase_return_id' => 1,
                'product_name' => 'Product A',
                'stock' => 50,
                'quantity' => 5,
                'net_unit_price' => 20.00,
                'discount' => 2.00,
                'tax' => 3.00,
                'subtotal' => 90.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'purchase_return_id' => 2,
                'product_name' => 'Product B',
                'stock' => 30,
                'quantity' => 3,
                'net_unit_price' => 25.00,
                'discount' => 1.00,
                'tax' => 4.00,
                'subtotal' => 75.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
