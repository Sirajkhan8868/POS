<?php

namespace Database\Seeders;

use App\Models\Catagory;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            [
                'category_code' => 'CA_16',
                'category_name' => 'Notebooks',
                'product_count' => 2
            ],
            [
                'category_code' => 'CB_13',
                'category_name' => 'Books',
                'product_count' => 4
            ],
            [
                'category_code' => 'CB_15',
                'category_name' => 'Dairy',
                'product_count' => 5
            ],
            [
                'category_code' => 'CB_17',
                'category_name' => 'Bed',
                'product_count' => 6
            ],
        ]);
    }
}
