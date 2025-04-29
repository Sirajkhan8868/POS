<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PurchaseItem;
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
        // Insert a few sample records into the purchase_items table
        PurchaseItem::create([
            'purchase_id' => 1, // Ensure that purchase_id 1 exists in your purchase table
            'product_name' => 'Product 1',
            'stock' => 100,
            'quantity' => 10,
            'net_unit_price' => 50.00,
            'discount' => 5.00,
            'tax' => 7.00,
            'subtotal' => 450.00,
        ]);

        PurchaseItem::create([
            'purchase_id' => 2, // Ensure that purchase_id 2 exists
            'product_name' => 'Product 2',
            'stock' => 200,
            'quantity' => 20,
            'net_unit_price' => 30.00,
            'discount' => 2.00,
            'tax' => 4.00,
            'subtotal' => 560.00,
        ]);

        PurchaseItem::create([
            'purchase_id' => 3, // Ensure that purchase_id 3 exists
            'product_name' => 'Product 3',
            'stock' => 150,
            'quantity' => 15,
            'net_unit_price' => 40.00,
            'discount' => 3.00,
            'tax' => 6.00,
            'subtotal' => 540.00,
        ]);
    }
}
