<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quotation;
use App\Models\QuotationItem;

class QuotationItemSeeder extends Seeder
{
    public function run(): void
    {
        $quotations = Quotation::all();

        foreach ($quotations as $quotation) {
            foreach (range(1, rand(1, 5)) as $index) {
                QuotationItem::create([
                    'quotation_id'     => $quotation->id,
                    'product_name'     => 'Product-' . rand(1, 100),
                    'stock'            => rand(10, 100),
                    'quantity'         => rand(1, 10),
                    'net_unit_price'   => rand(100, 500),
                    'discount'         => rand(0, 20),
                    'tax'              => rand(5, 15),
                    'subtotal'         => rand(500, 2000),
                ]);
            }
        }
    }
}
