<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Customer;
use Carbon\Carbon;

class QuotationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ensure there are products and customers in the database
        $product = Product::inRandomOrder()->first();
        $customer = Customer::inRandomOrder()->first();

        // If no products or customers exist, insert a dummy record to avoid error
        if (!$product) {
            $product = Product::create([
                'product_name' => 'Dummy Product',
                'product_code' => 'P000',
                'category_id' => 1, // Make sure this category exists
                'barcode_symbology' => 'EAN-13',
                'cost' => 10.00,
                'price' => 20.00,
                'quantity' => 100,
                'alert_quantity' => 10,
                'tax' => 18.00,
                'tax_type' => 'percentage',
                'unit_id' => 1, // Make sure this unit exists
                'note' => 'Dummy product',
            ]);
        }

        if (!$customer) {
            $customer = Customer::create([
                'name' => 'Dummy Customer',
                'email' => 'dummy@customer.com',
                'phone' => '1234567890',
                'address' => '123 Dummy St.',
            ]);
        }

        // Insert quotation data
        $quotationId = DB::table('quotations')->insertGetId([
            'reference' => 'QT-' . strtoupper(uniqid()),
            'product_id' => $product->id, // Ensure a valid product ID is used
            'customer_id' => $customer->id, // Ensure a valid customer ID is used
            'date' => Carbon::now()->format('Y-m-d'),
            'tax' => 18.00,
            'discount' => 5.00,
            'shipping' => 10.00,
            'total_amount' => 150.00,
            'status' => 'Pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert quotation items data
        DB::table('quotation_items')->insert([
            [
                'quotation_id' => $quotationId,
                'product_name' => $product->product_name, // Use the product name from the created product
                'stock' => 50,
                'quantity' => 10,
                'net_unit_price' => 15.00,
                'discount' => 2.00,
                'tax' => 3.00,
                'subtotal' => 130.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'quotation_id' => $quotationId,
                'product_name' => $product->product_name, // Use the product name from the created product
                'stock' => 100,
                'quantity' => 5,
                'net_unit_price' => 25.00,
                'discount' => 1.00,
                'tax' => 5.00,
                'subtotal' => 120.00,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
