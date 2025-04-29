<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PurchaseReturnItem;
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
        PurchaseReturnItem::create([
            'purchase_return_id' => 1,
            'product_name' => 'Product 1',
            'stock' => 50,
            'quantity' => 5,
            'net_unit_price' => 50.00,
            'discount' => 5.00,
            'tax' => 7.00,
            'subtotal' => 225.00,
        ]);

        PurchaseReturnItem::create([
            'purchase_return_id' => 2,
            'product_name' => 'Product 2',
            'stock' => 100,
            'quantity' => 10,
            'net_unit_price' => 30.00,
            'discount' => 2.00,
            'tax' => 4.00,
            'subtotal' => 280.00,
        ]);

        PurchaseReturnItem::create([
            'purchase_return_id' => 3, // Ensure that purchase_return_id 3 exists
            'product_name' => 'Product 3',
            'stock' => 75,
            'quantity' => 7,
            'net_unit_price' => 40.00,
            'discount' => 3.00,
            'tax' => 6.00,
            'subtotal' => 315.00,
        ]);
    }
}
