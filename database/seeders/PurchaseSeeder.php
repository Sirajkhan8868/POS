<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert sample purchase data
        DB::table('purchases')->insert([
            [
                'reference' => 'PUR-' . strtoupper(uniqid()),
                'product_id' => 1, // Assuming product with ID 1 exists
                'supplier_id' => 1, // Assuming supplier with ID 1 exists
                'date' => Carbon::now()->format('Y-m-d'),
                'tax' => 18.00,
                'discount' => 5.00,
                'shipping' => 10.00,
                'total_amount' => 150.00,
                'status' => 'Pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'reference' => 'PUR-' . strtoupper(uniqid()),
                'product_id' => 2, // Assuming product with ID 2 exists
                'supplier_id' => 2, // Assuming supplier with ID 2 exists
                'date' => Carbon::now()->format('Y-m-d'),
                'tax' => 18.00,
                'discount' => 7.00,
                'shipping' => 15.00,
                'total_amount' => 200.00,
                'status' => 'Approved',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'reference' => 'PUR-' . strtoupper(uniqid()),
                'product_id' => 3, // Assuming product with ID 3 exists
                'supplier_id' => 3, // Assuming supplier with ID 3 exists
                'date' => Carbon::now()->format('Y-m-d'),
                'tax' => 18.00,
                'discount' => 0.00,
                'shipping' => 20.00,
                'total_amount' => 300.00,
                'status' => 'Rejected',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
