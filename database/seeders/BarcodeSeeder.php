<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barcode;

class BarcodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Barcode::create([
            'product_name' => 'Product A',
            'product_code' => 'A001',
            'quantity' => 100,
            'barcode_print' => 'barcode'
        ]);

        Barcode::create([
            'product_name' => 'Product B',
            'product_code' => 'B001',
            'quantity' => 150,
            'barcode_print' => 'qr_code'
        ]);

        Barcode::create([
            'product_name' => 'Product C',
            'product_code' => 'C001',
            'quantity' => 200,
            'barcode_print' => 'barcode'
        ]);

        Barcode::create([
            'product_name' => 'Product D',
            'product_code' => 'D001',
            'quantity' => 250,
            'barcode_print' => 'qr_code'
        ]);
    }
}
