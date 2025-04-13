<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SuppliersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('suppliers')->insert([
            [
                'supplier_name' => 'ABC Electronics',
                'email' => 'contact@abcelectronics.com',
                'phone' => '1234567890',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'supplier_name' => 'Global Tools Co.',
                'email' => 'support@globaltools.com',
                'phone' => '9876543210',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'supplier_name' => 'Furniture Supplies Ltd.',
                'email' => 'info@furnituresupplies.com',
                'phone' => '5551234567',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'supplier_name' => 'Fresh Foods Ltd.',
                'email' => 'sales@freshfoods.com',
                'phone' => '4447654321',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'supplier_name' => 'Packaging Solutions Inc.',
                'email' => 'contact@packagingsolutions.com',
                'phone' => '2223344556',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
