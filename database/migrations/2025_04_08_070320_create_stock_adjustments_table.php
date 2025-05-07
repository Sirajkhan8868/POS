<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('stock_adjustments', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->date('date');
            $table->text('note')->nullable();
            $table->timestamps();
        });

    }

    public function down(): void {
        Schema::dropIfExists('stock_adjustments');
    }
};
