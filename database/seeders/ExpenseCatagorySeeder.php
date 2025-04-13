<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ExpenseCategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('expense_category')->insert([
            [
                'category_name' => 'Office Supplies',
                'description' => 'Expenses for office materials, stationery, and equipment',
                'expenses_count' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_name' => 'Utilities',
                'description' => 'Expenses related to electricity, water, internet, and other utilities',
                'expenses_count' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_name' => 'Marketing',
                'description' => 'Expenses for digital marketing, advertisements, and promotional activities',
                'expenses_count' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_name' => 'Travel',
                'description' => 'Expenses for business trips, transportation, and accommodations',
                'expenses_count' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_name' => 'Salaries',
                'description' => 'Employee salary payments and related costs',
                'expenses_count' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
