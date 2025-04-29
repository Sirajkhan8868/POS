<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('units')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Unit::insert([
            [
                'id' => 1,
                'name' => 'Kilogram',
                'short_name' => 'kg',
                'operator' => 'multiply',
                'operator_value' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Gram',
                'short_name' => 'g',
                'operator' => 'multiply',
                'operator_value' => 1000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Meter',
                'short_name' => 'm',
                'operator' => 'multiply',
                'operator_value' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Centimeter',
                'short_name' => 'cm',
                'operator' => 'multiply',
                'operator_value' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Liter',
                'short_name' => 'L',
                'operator' => 'multiply',
                'operator_value' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'name' => 'Milliliter',
                'short_name' => 'mL',
                'operator' => 'multiply',
                'operator_value' => 1000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'name' => 'Piece',
                'short_name' => 'pc',
                'operator' => null,
                'operator_value' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
