<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerShipTable extends Migration
{
    public function up()
    {
        Schema::create('customer_ship', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->unsignedBigInteger('ship_id');
            $table->foreign('ship_id')->references('id')->on('ships')->onDelete('cascade');
            $table->boolean('is_owner')->default(0);
            $table->boolean('is_borrower')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customer_ship');
    }
}
