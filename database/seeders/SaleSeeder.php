<?php
use Illuminate\Database\Seeder;
use App\Models\Sale;
use App\Models\SaleItem;

class SaleSeeder extends Seeder
{
    public function run()
    {
        $sale = Sale::create([
            'reference' => 'SL-00001',
            'customer' => 'Customer 1',
            'date' => now(),
            'tax' => 100,
            'discount' => 50,
            'shipping' => 100,
            'total_amount' => 950,
            'status' => 'Completed'
        ]);

        $sale->items()->createMany([
            [
                'product_name' => 'Product A',
                'stock' => 100,
                'quantity' => 2,
                'net_unit_price' => 300,
                'discount' => 0,
                'tax' => 25,
                'subtotal' => 650
            ]
        ]);
    }
}
