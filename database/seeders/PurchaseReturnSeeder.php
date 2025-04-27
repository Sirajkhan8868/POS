<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PurchaseReturnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('purchase_returns')->insert([
            [
                'reference' => 'PR-001',
                'supplier' => 'Supplier A',
                'date' => Carbon::now()->format('Y-m-d'),
                'tax' => 20.00,
                'discount' => 5.00,
                'shipping' => 15.00,
                'total_amount' => 150.00,
                'status' => 'Completed',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'reference' => 'PR-002',
                'supplier' => 'Supplier B',
                'date' => Carbon::now()->format('Y-m-d'),
                'tax' => 18.00,
                'discount' => 8.00,
                'shipping' => 12.00,
                'total_amount' => 120.00,
                'status' => 'Pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
