<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ExpensesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('expenses')->insert([
            [
                'reference' => 'EXP001',
                'category' => 'Office Supplies',
                'amount' => 150.00,
                'details' => 'Purchase of office chairs and desks',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'reference' => 'EXP002',
                'category' => 'Utilities',
                'amount' => 120.50,
                'details' => 'Monthly electricity bill',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'reference' => 'EXP003',
                'category' => 'Marketing',
                'amount' => 500.00,
                'details' => 'Digital marketing campaign expenses',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'reference' => 'EXP004',
                'category' => 'Travel',
                'amount' => 350.00,
                'details' => 'Business trip travel expenses',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'reference' => 'EXP005',
                'category' => 'Salaries',
                'amount' => 2000.00,
                'details' => 'Employee salary payments for the month',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
