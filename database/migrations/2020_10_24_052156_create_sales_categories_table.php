<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('sales_categories', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('sales_details');
            $table->integer('order');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales_categories');
    }
}
