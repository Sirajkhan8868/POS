<?php

namespace Database\Seeders;

use App\Models\PurchaseReturnItem;
use App\Models\PurchaseReturnReportItem;
use Illuminate\Database\Seeder;
use PurchaseItemSeeder;
use PurchaseReturnSeeder;
use PurchaseSeeder;
use QuotationItemSeeder;
use QuotationSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CatagorySeeder::class,
            UnitSeeder::class,
            ProductSeeder::class,
            CustomerSeeder::class,
            CurrencySeeder::class,
            BarcodeSeeder::class,
            StockAdjustmentSeeder::class,
            StockAdjustmentItemsSeeder::class,
            ExpensesTableSeeder::class,
            ExpenseCategorySeeder::class,
            PurchaseItemSeeder::class,
            PurchaseReturnSeeder::class,
            PurchaseSeeder::class,
            PurchaseReportsTableSeeder::class,
            PurchaseReportItemsTableSeeder::class,
            PurchaseReturnItem::class,
            PurchaseReturnReportItem::class,
            QuotationSeeder::class,
            QuotationItemSeeder::class,
            RolesTableSeeder::class,
            SaleTableSeeder::class,
            SaleItemsTableSeeder::class,
            SaleReturnSeeder::class,
            SaleReturnItemSeeder::class,
            SuppliersTableSeeder::class,

        ]);
    }
}
