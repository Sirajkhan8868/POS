<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    public function run()
    {
        $currencies = [
            [
                'currency_name'    => 'United States Dollar',
                'code'             => 'USD',
                'symbol'           => '$',
                'thousand_operator'=> ',',
                'decimal_operator' => '.',
            ],
            [
                'currency_name'    => 'Euro',
                'code'             => 'EUR',
                'symbol'           => '€',
                'thousand_operator'=> ',',
                'decimal_operator' => '.',
            ],
            [
                'currency_name'    => 'British Pound',
                'code'             => 'GBP',
                'symbol'           => '£',
                'thousand_operator'=> ',',
                'decimal_operator' => '.',
            ],
            [
                'currency_name'    => 'Indian Rupee',
                'code'             => 'INR',
                'symbol'           => '₹',
                'thousand_operator'=> ',',
                'decimal_operator' => '.',
            ],
            [
                'currency_name'    => 'Japanese Yen',
                'code'             => 'JPY',
                'symbol'           => '¥',
                'thousand_operator'=> ',',
                'decimal_operator' => '.',
            ],
        ];

        DB::table('currencies')->insert($currencies);
    }
}
