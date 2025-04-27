<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpenseCategoryTable extends Migration
{
    public function up()
    {
        Schema::create('expense_category', function (Blueprint $table) {
            $table->id();
            $table->string('category_name');
            $table->text('description');
            $table->integer('expenses_count');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('expense_category');
    }
}
