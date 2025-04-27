<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
    public function run()
    {
        if (Unit::count() == 0) {
            Unit::create([
                'name' => 'Kilogram',
                'short_name' => 'kg',
                'operator' => 'multiply',
                'operator_value' => 1,
            ]);
            Unit::create([
                'name' => 'Gram',
                'short_name' => 'g',
                'operator' => 'multiply',
                'operator_value' => 1000,
            ]);
            Unit::create([
                'name' => 'Meter',
                'short_name' => 'm',
                'operator' => 'multiply',
                'operator_value' => 1,
            ]);
            Unit::create([
                'name' => 'Centimeter',
                'short_name' => 'cm',
                'operator' => 'multiply',
                'operator_value' => 100,
            ]);
            Unit::create([
                'name' => 'Liter',
                'short_name' => 'L',
                'operator' => 'multiply',
                'operator_value' => 1,
            ]);
            Unit::create([
                'name' => 'Milliliter',
                'short_name' => 'mL',
                'operator' => 'multiply',
                'operator_value' => 1000,
            ]);
            Unit::create([
                'name' => 'Piece',
                'short_name' => 'pc',
                'operator' => null,
                'operator_value' => 1,
            ]);
        }
    }
}
