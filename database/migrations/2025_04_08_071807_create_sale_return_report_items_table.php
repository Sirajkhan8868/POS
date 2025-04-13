<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_return_report_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sale_return_report_id')->constrained('sale_reports')->onDelete('cascade');
            $table->date('date');
            $table->string('reference');
            $table->foreignId('customer_id')->constrained('suppliers')->onDelete('cascade');
            $table->enum('status', ['pending', 'received', 'returned']);
            $table->decimal('total', 15, 2);
            $table->decimal('paid', 15, 2);
            $table->decimal('due', 15, 2);
            $table->enum('payment_status', ['unpaid', 'partial', 'paid']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_return_report_items');
    }
};
