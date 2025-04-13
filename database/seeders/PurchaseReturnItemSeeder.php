<?php
use Illuminate\Database\Seeder;
use App\Models\PurchaseReturn;
use App\Models\PurchaseReturnItem;

class PurchaseReturnItemSeeder extends Seeder
{
    public function run(): void
    {
        $return1 = PurchaseReturn::where('reference', 'PR-00001')->first();
        $return2 = PurchaseReturn::where('reference', 'PR-00002')->first();
        $return3 = PurchaseReturn::where('reference', 'PR-00003')->first();

        if ($return1) {
            PurchaseReturnItem::create([
                'purchase_return_id' => $return1->id,
                'product_name' => 'Product A',
                'stock' => 5,
                'quantity' => 1,
                'net_unit_price' => 400.00,
                'discount' => 2.00,
                'tax' => 5.00,
                'subtotal' => 403.00,
            ]);
        }

        if ($return2) {
            PurchaseReturnItem::create([
                'purchase_return_id' => $return2->id,
                'product_name' => 'Product B',
                'stock' => 10,
                'quantity' => 2,
                'net_unit_price' => 150.00,
                'discount' => 10.00,
                'tax' => 0.00,
                'subtotal' => 290.00,
            ]);
        }

        if ($return3) {
            PurchaseReturnItem::create([
                'purchase_return_id' => $return3->id,
                'product_name' => 'Product C',
                'stock' => 3,
                'quantity' => 1,
                'net_unit_price' => 180.00,
                'discount' => 0.00,
                'tax' => 8.00,
                'subtotal' => 188.00,
            ]);
        }
    }
}
