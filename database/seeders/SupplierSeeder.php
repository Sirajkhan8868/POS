<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::create([
            'supplier_name' => 'Global Supplies Ltd.',
            'email' => 'contact@globalsupplies.com',
            'phone' => '03121234567',
        ]);

        Supplier::create([
            'supplier_name' => 'Fast Traders Co.',
            'email' => 'info@fasttraders.com',
            'phone' => '03211234567',
        ]);

        Supplier::create([
            'supplier_name' => 'Alpha Distributors',
            'email' => 'sales@alphadistributors.com',
            'phone' => '03331234567',
        ]);

        Supplier::create([
            'supplier_name' => 'Mega Wholesale',
            'email' => 'support@megawholesale.com',
            'phone' => '03451234567',
        ]);
    }
}
