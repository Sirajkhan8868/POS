<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Currency::create([
            'currency_name' => 'US Dollar',
            'code' => 'USD',
            'symbol' => '$',
            'thousand_operator' => ',',
            'decimal_operator' => '.',
        ]);

        Currency::create([
            'currency_name' => 'Euro',
            'code' => 'EUR',
            'symbol' => '€',
            'thousand_operator' => '.',
            'decimal_operator' => ',',
        ]);

        Currency::create([
            'currency_name' => 'Pakistani Rupee',
            'code' => 'PKR',
            'symbol' => '₨',
            'thousand_operator' => ',',
            'decimal_operator' => '.',
        ]);

        Currency::create([
            'currency_name' => 'British Pound',
            'code' => 'GBP',
            'symbol' => '£',
            'thousand_operator' => ',',
            'decimal_operator' => '.',
        ]);
    }
}
