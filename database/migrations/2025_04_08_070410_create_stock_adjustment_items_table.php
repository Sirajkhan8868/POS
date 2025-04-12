<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('stock_adjustment_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('adjustment_id')->constrained('stock_adjustments');
            $table->foreignId('product_id')->constrained();
            $table->string('stock');
            $table->string('code');
            $table->string('quantity');
            $table->enum('type', ['increase', 'decrease']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stock_adjustment_items');
    }
};
