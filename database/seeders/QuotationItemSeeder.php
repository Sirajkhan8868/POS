<?php
use Illuminate\Database\Seeder;
use App\Models\Quotation;
use App\Models\QuotationItem;

class QuotationItemSeeder extends Seeder
{
    public function run(): void
    {
        $quotation1 = Quotation::where('reference', 'QT-00001')->first();
        $quotation4 = Quotation::where('reference', 'QT-00004')->first();

        if ($quotation1) {
            QuotationItem::create([
                'quotation_id' => $quotation1->id,
                'product_name' => 'Product A',
                'stock' => 10,
                'quantity' => 1,
                'net_unit_price' => 153.00,
                'discount' => 0,
                'tax' => 0,
                'subtotal' => 153.00,
            ]);
        }

        if ($quotation4) {
            QuotationItem::create([
                'quotation_id' => $quotation4->id,
                'product_name' => 'Product A',
                'stock' => 10,
                'quantity' => 1,
                'net_unit_price' => 153.00,
                'discount' => 0,
                'tax' => 0,
                'subtotal' => 153.00,
            ]);
        }
    }
}
