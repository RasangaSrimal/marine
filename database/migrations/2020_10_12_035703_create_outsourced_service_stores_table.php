<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutsourcedServiceStoresTable extends Migration
{
    public function up()
    {
        Schema::create('outsourced_service_stores', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->integer('cost_rate');
            $table->integer('order');
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('outsourced_service_stores');
    }
}
