<?php
use Illuminate\Database\Seeder;
use App\Models\Quotation;

class QuotationSeeder extends Seeder
{
    public function run(): void
    {
        Quotation::create([
            'reference' => 'QT-00001',
            'customer' => 'Customer 1',
            'date' => '2024-04-16',
            'tax' => 0,
            'discount' => 0,
            'shipping' => 0,
            'total_amount' => 153.00,
            'status' => 'Pending',
        ]);

        Quotation::create([
            'reference' => 'QT-00003',
            'customer' => 'Customer 1',
            'date' => '2024-04-22',
            'tax' => 0,
            'discount' => 0,
            'shipping' => 0,
            'total_amount' => 0.00,
            'status' => 'Pending',
        ]);

        Quotation::create([
            'reference' => 'QT-00004',
            'customer' => 'Customer 1',
            'date' => '2024-04-26',
            'tax' => 0,
            'discount' => 0,
            'shipping' => 0,
            'total_amount' => 153.00,
            'status' => 'Pending',
        ]);

        Quotation::create([
            'reference' => 'QT-00005',
            'customer' => 'Customer 1',
            'date' => '2025-02-28',
            'tax' => 0,
            'discount' => 0,
            'shipping' => 0,
            'total_amount' => 0.00,
            'status' => 'Pending',
        ]);
    }
}
