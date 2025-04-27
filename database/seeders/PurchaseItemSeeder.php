<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PurchaseItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('purchase_items')->insert([
            [
                'purchase_id' => 1,
                'product_name' => 'Product A',
                'stock' => 50,
                'quantity' => 10,
                'net_unit_price' => 20.00,
                'discount' => 5.00,
                'tax' => 3.60,
                'subtotal' => 200.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'purchase_id' => 1,
                'product_name' => 'Product B',
                'stock' => 100,
                'quantity' => 5,
                'net_unit_price' => 25.00,
                'discount' => 2.00,
                'tax' => 4.50,
                'subtotal' => 125.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'purchase_id' => 2,
                'product_name' => 'Product C',
                'stock' => 200,
                'quantity' => 3,
                'net_unit_price' => 15.00,
                'discount' => 1.50,
                'tax' => 2.70,
                'subtotal' => 46.50,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
