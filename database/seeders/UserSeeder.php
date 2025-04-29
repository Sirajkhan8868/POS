<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Insert some sample users
        DB::table('users')->insert([
            [
                'name'              => 'Admin User',
                'email'             => 'admin@example.com',
                'password'          => Hash::make('password123'),
                'role'              => 'admin',
                'status'            => 'active',
                'image'             => null,
                'email_verified_at' => now(),
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'name'              => 'Manager User',
                'email'             => 'manager@example.com',
                'password'          => Hash::make('password123'),
                'role'              => 'manager',
                'status'            => 'active',
                'image'             => null,
                'email_verified_at' => now(),
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'name'              => 'Regular User',
                'email'             => 'user@example.com',
                'password'          => Hash::make('password123'),
                'role'              => 'user',
                'status'            => 'active',
                'image'             => null,
                'email_verified_at' => now(),
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ]);
    }
}
