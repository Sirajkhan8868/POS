<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'name' => 'view_dashboard',
                'action' => 'view',
            ],
            [
                'name' => 'edit_profile',
                'action' => 'edit',
            ],
            [
                'name' => 'create_post',
                'action' => 'create',
            ],
            [
                'name' => 'delete_post',
                'action' => 'delete',
            ],
            [
                'name' => 'view_reports',
                'action' => 'view',
            ],
            [
                'name' => 'manage_users',
                'action' => 'edit',
            ],
        ]);
    }
}
