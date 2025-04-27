<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'category_code' => 'CAT001',
            'category_name' => 'Electronics',
        ]);

        Category::create([
            'category_code' => 'CAT002',
            'category_name' => 'Clothing',
        ]);

        Category::create([
            'category_code' => 'CAT003',
            'category_name' => 'Books',
        ]);

        Category::create([
            'category_code' => 'CAT004',
            'category_name' => 'Home Appliances',
        ]);
    }
}
