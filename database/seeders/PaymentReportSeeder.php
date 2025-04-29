<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentReportSeeder extends Seeder
{
    public function run()
    {
        DB::table('payment_reports')->insert([
            [
                'start_date'    => '2025-04-01',
                'end_date'      => '2025-04-30',
                'payment'       => 5000.00,
                'payment_method'=> 'Credit Card',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'start_date'    => '2025-04-01',
                'end_date'      => '2025-04-30',
                'payment'       => 1500.50,
                'payment_method'=> 'PayPal',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'start_date'    => '2025-04-01',
                'end_date'      => '2025-04-30',
                'payment'       => 1200.75,
                'payment_method'=> 'Bank Transfer',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'start_date'    => '2025-05-01',
                'end_date'      => '2025-05-31',
                'payment'       => 2000.00,
                'payment_method'=> 'Cash',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);
    }
}
