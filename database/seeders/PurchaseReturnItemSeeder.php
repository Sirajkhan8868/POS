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


    }
}
