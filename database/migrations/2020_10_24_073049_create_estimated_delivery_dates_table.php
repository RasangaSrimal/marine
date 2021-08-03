<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimatedDeliveryDatesTable extends Migration
{
    public function up()
    {
        Schema::create('estimated_delivery_dates', function (Blueprint $table) {
            $table->id();
            $table->string('delivery_date');
            $table->integer('order');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('estimated_delivery_dates');
    }
}
