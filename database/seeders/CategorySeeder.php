<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Category::where('category_name', 'Electronics')->exists()) {
            Category::create([
                'category_code' => 'CAT' . Str::upper(Str::random(6)),
                'category_name' => 'Electronics',
            ]);
        }

        if (!Category::where('category_name', 'Clothing')->exists()) {
            Category::create([
                'category_code' => 'CAT' . Str::upper(Str::random(6)),
                'category_name' => 'Clothing',
            ]);
        }
    }
}
