<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert([
            [
                'currency_name' => 'US Dollar',
                'code' => 'USD',
                'symbol' => '$',
                'thousand_operator' => ',',
                'decimal_operator' => '.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'currency_name' => 'Euro',
                'code' => 'EUR',
                'symbol' => '€',
                'thousand_operator' => '.',
                'decimal_operator' => ',',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'currency_name' => 'Japanese Yen',
                'code' => 'JPY',
                'symbol' => '¥',
                'thousand_operator' => ',',
                'decimal_operator' => '.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
