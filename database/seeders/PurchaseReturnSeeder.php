<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PurchaseReturn;
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
        PurchaseReturn::create([
            'reference' => 'PR-1001',
            'supplier_id' => 1,
            'date' => Carbon::now()->toDateString(),
            'tax' => 15.00,
            'discount' => 5.00,
            'shipping' => 10.00,
            'total_amount' => 100.00,
            'status' => 'completed',
        ]);

        PurchaseReturn::create([
            'reference' => 'PR-1002',
            'supplier_id' => 2,
            'date' => Carbon::now()->subDays(1)->toDateString(),
            'tax' => 20.00,
            'discount' => 10.00,
            'shipping' => 15.00,
            'total_amount' => 200.00,
            'status' => 'pending',
        ]);

        PurchaseReturn::create([
            'reference' => 'PR-1003',
            'supplier_id' => 3,
            'date' => Carbon::now()->subDays(5)->toDateString(),
            'tax' => 10.00,
            'discount' => 0.00,
            'shipping' => 5.00,
            'total_amount' => 50.00,
            'status' => 'cancelled',
        ]);
    }
}
