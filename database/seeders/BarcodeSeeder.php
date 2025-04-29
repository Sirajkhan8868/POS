<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BarcodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('barcodes')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('barcodes')->insert([
            [
                'product_name' => 'Product A',
                'product_code' => 'A001',
                'quantity' => 10,
                'barcode_print' => 'barcode',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'product_name' => 'Product B',
                'product_code' => 'B002',
                'quantity' => 20,
                'barcode_print' => 'qr_code',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'product_name' => 'Product C',
                'product_code' => 'C003',
                'quantity' => 15,
                'barcode_print' => 'barcode',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
