<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::insert([
            [
                'product_name' => 'Notebook A5',
                'product_code' => 'P001',
                'catagory_id' => 1,
                'barcode_symbology' => 'EAN-13',
                'cost' => 50.00,
                'price' => 75.00,
                'quantity' => 100,
                'alert_quantity' => 10,
                'tax' => 5.00,
                'tax_type' => 'percent',
                'unit_id' => 1,
                'note' => 'Top-selling notebook'
            ],
            [
                'product_name' => 'Science Book',
                'product_code' => 'P002',
                'catagory_id' => 2,
                'barcode_symbology' => 'EAN-13',
                'cost' => 80.00,
                'price' => 120.00,
                'quantity' => 50,
                'alert_quantity' => 5,
                'tax' => 10.00,
                'tax_type' => 'percent',
                'unit_id' => 1,
                'note' => 'For high school students'
            ]
        ]);
    }
}
