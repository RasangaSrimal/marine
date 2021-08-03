<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimatedDeliveryPlacesTable extends Migration
{
    public function up()
    {
        Schema::create('estimated_delivery_places', function (Blueprint $table) {
            $table->id();
            $table->string('delivery_place');
            $table->integer('order');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('estimated_delivery_places');
    }
}
