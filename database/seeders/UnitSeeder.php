<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    public function run()
    {
        DB::table('units')->insert([
            [
                'name' => 'Pieces',
                'short_name' => 'pcs',
                'operator' => '*',
                'operator_value' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Box',
                'short_name' => 'box',
                'operator' => '*',
                'operator_value' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
