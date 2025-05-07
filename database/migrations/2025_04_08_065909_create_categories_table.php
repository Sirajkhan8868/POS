<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

public function up()
{
    Schema::create('categories', function (Blueprint $table) {
        $table->id();
        $table->string('category_code')->unique();
        $table->string('category_name')->unique();
        $table->integer('product_count')->default(0); // Add product_count column with default value
        $table->timestamps();
    });
}


    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
