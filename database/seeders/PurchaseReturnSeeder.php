<?php
use Illuminate\Database\Seeder;
use App\Models\PurchaseReturn;

class PurchaseReturnSeeder extends Seeder
{
    public function run(): void
    {
        PurchaseReturn::create([
            'reference' => 'PR-00001',
            'supplier' => 'Supplier A',
            'date' => '2024-04-01',
            'tax' => 5.00,
            'discount' => 2.00,
            'shipping' => 0.00,
            'total_amount' => 450.00,
            'status' => 'Pending',
        ]);

        PurchaseReturn::create([
            'reference' => 'PR-00002',
            'supplier' => 'Supplier B',
            'date' => '2024-04-10',
            'tax' => 0.00,
            'discount' => 10.00,
            'shipping' => 5.00,
            'total_amount' => 300.00,
            'status' => 'Approved',
        ]);

        PurchaseReturn::create([
            'reference' => 'PR-00003',
            'supplier' => 'Supplier C',
            'date' => '2024-04-12',
            'tax' => 8.00,
            'discount' => 0.00,
            'shipping' => 0.00,
            'total_amount' => 200.00,
            'status' => 'Rejected',
        ]);
    }
}
