<?php
use App\Models\SaleReturn;
use App\Models\SaleReturnItem;
use Illuminate\Database\Seeder;

class SaleReturnSeeder extends Seeder
{
    public function run(): void
    {
        $saleReturn = SaleReturn::create([
            'reference' => 'RT-0001',
            'customer' => 'Customer 1',
            'date' => now(),
            'tax' => 50,
            'discount' => 0,
            'shipping' => 100,
            'total_amount' => 1500,
            'status' => 'Pending',
        ]);

        SaleReturnItem::create([
            'sale_return_id' => $saleReturn->id,
            'product_name' => 'Test Product',
            'stock' => 10,
            'quantity' => 1,
            'net_unit_price' => 1000,
            'discount' => 0,
            'tax' => 50,
            'subtotal' => 1050,
        ]);
    }
}
