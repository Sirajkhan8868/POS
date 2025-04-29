<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Product;
use App\Models\Supplier;
use Faker\Factory as Faker;

class PurchaseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $products = Product::pluck('id')->toArray();
        $suppliers = Supplier::pluck('id')->toArray();

        foreach (range(1, 20) as $index) {
            $purchase = Purchase::create([
                'reference'     => 'PUR-' . strtoupper(uniqid()),
                'product_id'    => $faker->randomElement($products),
                'supplier_id'   => $faker->randomElement($suppliers),
                'date'          => $faker->date(),
                'tax'           => $faker->randomFloat(2, 0, 100),
                'discount'      => $faker->randomFloat(2, 0, 50),
                'shipping'      => $faker->randomFloat(2, 0, 150),
                'total_amount'  => $faker->randomFloat(2, 500, 5000),
                'status'        => $faker->randomElement(['Pending', 'Approved', 'Rejected']),
            ]);

            foreach (range(1, rand(1, 5)) as $itemIndex) {
                PurchaseItem::create([
                    'purchase_id'     => $purchase->id,
                    'product_name'    => $faker->word(),
                    'stock'           => $faker->numberBetween(10, 100),
                    'quantity'        => $faker->numberBetween(1, 20),
                    'net_unit_price'  => $faker->randomFloat(2, 50, 500),
                    'discount'        => $faker->randomFloat(2, 0, 30),
                    'tax'             => $faker->randomFloat(2, 0, 20),
                    'subtotal'        => $faker->randomFloat(2, 100, 1000),
                ]);
            }
        }
    }
}
