<?php
use Illuminate\Database\Seeder;
use App\Models\Purchase;

class PurchaseSeeder extends Seeder
{
    public function run(): void
    {
        Purchase::create([
            'reference' => 'PU-00001',
            'customer' => 'Customer A',
            'date' => '2024-04-01',
            'tax' => 5.00,
            'discount' => 10.00,
            'shipping' => 15.00,
            'total_amount' => 500.00,
            'status' => 'Pending',
        ]);

        Purchase::create([
            'reference' => 'PU-00002',
            'customer' => 'Customer B',
            'date' => '2024-04-10',
            'tax' => 0.00,
            'discount' => 0.00,
            'shipping' => 5.00,
            'total_amount' => 300.00,
            'status' => 'Approved',
        ]);

        Purchase::create([
            'reference' => 'PU-00003',
            'customer' => 'Customer C',
            'date' => '2024-04-12',
            'tax' => 8.50,
            'discount' => 0.00,
            'shipping' => 0.00,
            'total_amount' => 250.00,
            'status' => 'Rejected',
        ]);
    }
}
