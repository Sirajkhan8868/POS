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
    }
}
