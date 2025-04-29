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
            [
                'name'   => 'edit',
                'action' => 'edit records',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'   => 'delete',
                'action' => 'delete records',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'   => 'view',
                'action' => 'view records',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
