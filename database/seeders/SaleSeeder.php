<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SaleTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('sales')->insert([
            [
                'reference' => 'SALE001',
                'customer' => 'John Doe',
                'date' => Carbon::now()->format('Y-m-d'),
                'tax' => 15.50,
                'discount' => 5.00,
                'shipping' => 10.00,
                'total_amount' => 120.00,
                'status' => 'Pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'reference' => 'SALE002',
                'customer' => 'Jane Smith',
                'date' => Carbon::now()->format('Y-m-d'),
                'tax' => 18.00,
                'discount' => 8.00,
                'shipping' => 12.00,
                'total_amount' => 150.00,
                'status' => 'Approved',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'reference' => 'SALE003',
                'customer' => 'Alice Johnson',
                'date' => Carbon::now()->format('Y-m-d'),
                'tax' => 10.00,
                'discount' => 0.00,
                'shipping' => 5.00,
                'total_amount' => 100.00,
                'status' => 'Rejected',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
