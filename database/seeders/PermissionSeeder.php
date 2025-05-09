<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'name'   => 'create',
                'action' => 'create records',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
