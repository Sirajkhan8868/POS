<?php
use Illuminate\Database\Seeder;
use App\Models\Purchase;
use App\Models\PurchaseItem;

class PurchaseItemSeeder extends Seeder
{
    public function run(): void
    {
        $purchase1 = Purchase::where('reference', 'PU-00001')->first();
        $purchase2 = Purchase::where('reference', 'PU-00002')->first();
        $purchase3 = Purchase::where('reference', 'PU-00003')->first();

        if ($purchase1) {
            PurchaseItem::create([
                'purchase_id' => $purchase1->id,
                'product_name' => 'Product A',
                'stock' => 20,
                'quantity' => 2,
                'net_unit_price' => 200.00,
                'discount' => 10.00,
                'tax' => 5.00,
                'subtotal' => 390.00,
            ]);

            PurchaseItem::create([
                'purchase_id' => $purchase1->id,
                'product_name' => 'Product B',
                'stock' => 15,
                'quantity' => 1,
                'net_unit_price' => 125.00,
                'discount' => 0.00,
                'tax' => 5.00,
                'subtotal' => 130.00,
            ]);
        }

        if ($purchase2) {
            PurchaseItem::create([
                'purchase_id' => $purchase2->id,
                'product_name' => 'Product C',
                'stock' => 30,
                'quantity' => 3,
                'net_unit_price' => 100.00,
                'discount' => 0.00,
                'tax' => 0.00,
                'subtotal' => 300.00,
            ]);
        }

        if ($purchase3) {
            PurchaseItem::create([
                'purchase_id' => $purchase3->id,
                'product_name' => 'Product D',
                'stock' => 10,
                'quantity' => 1,
                'net_unit_price' => 230.00,
                'discount' => 0.00,
                'tax' => 8.50,
                'subtotal' => 238.50,
            ]);
        }
    }
}
