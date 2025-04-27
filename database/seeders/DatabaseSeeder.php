<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use SuppliersTableSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            BarcodeSeeder::class,
            CategorySeeder::class,
            CurrencySeeder::class,
            CustomerSeeder::class,
            SupplierSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            ProductSeeder::class,
            UnitSeeder::class,
            QuotationSeeder::class,
            StockAdjustmentSeeder::class,
            StockAdjustmentItemSeeder::class,
            PurchaseSeeder::class,
            PurchaseItemSeeder::class,
            PurchaseReturnSeeder::class,
            PurchaseReturnItemSeeder::class,
        ]);
    }
}
