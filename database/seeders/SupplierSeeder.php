<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Supplier;
use Faker\Factory as Faker;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            Supplier::create([
                'supplier_name' => $faker->company,
                'email'         => $faker->unique()->safeEmail,
                'phone'         => '03' . rand(10000000, 99999999),
            ]);
        }
    }
}
