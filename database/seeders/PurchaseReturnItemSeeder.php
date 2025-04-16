<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PurchaseReturnItem;
use App\Models\PurchaseReturn;

class PurchaseReturnItemSeeder extends Seeder
{
    public function run()
    {
        $purchaseReturn = PurchaseReturn::first();

        PurchaseReturnItem::create([
            'purchase_return_id' => $purchaseReturn->id,
            'product_name' => 'Product 1',
            'stock' => 10,
            'quantity' => 5,
            'net_unit_price' => 10.00,
            'discount' => 1.00,
            'tax' => 0.50,
            'subtotal' => 45.00,
        ]);
    }
}
