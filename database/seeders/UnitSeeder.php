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




        ]);
    }
}
