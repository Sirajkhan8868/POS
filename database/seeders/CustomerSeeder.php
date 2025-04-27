<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create([
            'customer_name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '1234567890',
            'address' => '123 Main Street, City, Country',
        ]);

        Customer::create([
            'customer_name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'phone' => '9876543210',
            'address' => '456 Elm Street, Town, Country',
        ]);

        Customer::create([
            'customer_name' => 'Ali Khan',
            'email' => 'ali@example.com',
            'phone' => '03001234567',
            'address' => 'Karachi, Pakistan',
        ]);

        Customer::create([
            'customer_name' => 'Sara Lee',
            'email' => 'sara@example.com',
            'phone' => '03111234567',
            'address' => 'Lahore, Pakistan',
        ]);
    }
}
