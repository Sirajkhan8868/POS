<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quotation;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Support\Str;

class QuotationSeeder extends Seeder
{
    public function run(): void
    {
        $customers = Customer::all();
        $products = Product::all();

        foreach (range(1, 10) as $index) {
            Quotation::create([
                'reference'     => 'QTN-' . strtoupper(Str::random(6)),
                'product_id'    => $products->random()->id,
                'customer_id'   => $customers->random()->id,
                'date'          => now()->subDays(rand(1, 30)),
                'tax'           => rand(5, 20),
                'discount'      => rand(0, 10),
                'shipping'      => rand(50, 200),
                'total_amount'  => rand(500, 2000),
                'status'        => ['Pending', 'Approved', 'Rejected'][rand(0, 2)],
            ]);
        }
    }
}
