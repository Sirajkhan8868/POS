<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
        ]);
    }
}
