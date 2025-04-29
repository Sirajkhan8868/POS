<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            UnitSeeder::class,
            ProductSeeder::class,
            BarcodeSeeder::class,
            StockAdjustmentSeeder::class,
            StockAdjustmentItemSeeder::class,
            CustomerSeeder::class,
            QuotationSeeder::class,
            QuotationItemSeeder::class,
            SupplierSeeder::class,
            PurchaseSeeder::class,
            PurchaseReturnSeeder::class,
            PurchaseItemSeeder::class,
            PurchaseReturnItemSeeder::class,
            PurchaseReturnReportSeeder::class,
            PurchaseReturnReportItemSeeder::class,
            SalesSeeder::class,
            SaleReturnsSeeder::class,
            SaleItemsSeeder::class,
            SaleReturnItemsSeeder::class,
            SaleReportsSeeder::class,
            SaleReportItemsSeeder::class,
            SaleReturnReportsSeeder::class,
            SaleReturnReportItemsSeeder::class,
            CurrencySeeder::class,
            UserSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            PaymentReportSeeder::class,
            ProfitLossSeeder::class,
        ]);
    }
}
