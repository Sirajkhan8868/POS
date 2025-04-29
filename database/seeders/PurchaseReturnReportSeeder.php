<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PurchaseReturnReport;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PurchaseReturnReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Example seed data
        $statuses = ['pending', 'completed', 'cancelled'];
        $payment_statuses = ['unpaid', 'partial', 'paid'];

        for ($i = 0; $i < 10; $i++) {
            DB::table('purchase_return_reports')->insert([
                'start_date' => Carbon::now()->subDays(rand(10, 30)),
                'end_date' => Carbon::now()->subDays(rand(1, 9)),
                'supplier_id' => rand(1, 5),
                'status' => $statuses[array_rand($statuses)],
                'payment_status' => $payment_statuses[array_rand($payment_statuses)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
