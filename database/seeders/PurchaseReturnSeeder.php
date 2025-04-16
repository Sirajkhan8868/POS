<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PurchaseReturn;

class PurchaseReturnSeeder extends Seeder
{
    public function run()
    {
        PurchaseReturn::create([
            'reference' => 'PR001',
            'supplier' => 'Supplier A',
            'date' => '2025-04-15',
            'tax' => 5.00,
            'discount' => 2.00,
            'shipping' => 0.00,
            'total_amount' => 50.00,
            'status' => 'Pending',
        ]);
    }
}
