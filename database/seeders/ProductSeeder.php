<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('products')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

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

        ]);
    }
}
