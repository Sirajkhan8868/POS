<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PurchaseReturnReportItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = ['pending', 'received', 'returned'];
        $paymentStatuses = ['unpaid', 'partial', 'paid'];

        for ($i = 0; $i < 10; $i++) {
            $total = rand(1000, 5000);
            $paid = rand(0, $total);
            $due = $total - $paid;

            DB::table('purchase_return_report_items')->insert([
                'purchase_return_report_id' => rand(1, 5),
                'date' => Carbon::now()->subDays(rand(1, 30)),
                'reference' => 'REF-' . strtoupper(Str::random(8)),
                'supplier_id' => rand(1, 5),
                'status' => $statuses[array_rand($statuses)],
                'total' => $total,
                'paid' => $paid,
                'due' => $due,
                'payment_status' => $paymentStatuses[array_rand($paymentStatuses)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
