<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'product_name' => 'Product A',
                'product_code' => 'A001',
                'category_id' => 1,
                'barcode_symbology' => 'EAN-13',
                'cost' => 10.00,
                'price' => 20.00,
                'quantity' => 100,
                'alert_quantity' => 10,
                'tax' => 18.00,
                'tax_type' => 'percentage',
                'unit_id' => 1,
                'note' => 'Sample product A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'product_name' => 'Product B',
                'product_code' => 'B002',
                'category_id' => 2,
                'barcode_symbology' => 'UPC',
                'cost' => 12.50,
                'price' => 25.00,
                'quantity' => 200,
                'alert_quantity' => 15,
                'tax' => 18.00,
                'tax_type' => 'percentage',
                'unit_id' => 2,
                'note' => 'Sample product B',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
