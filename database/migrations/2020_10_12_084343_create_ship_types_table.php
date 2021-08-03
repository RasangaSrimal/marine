<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipTypesTable extends Migration
{
    public function up()
    {
        Schema::create('ship_types', function (Blueprint $table) {
            $table->id();
            $table->string('ship_type');
            $table->integer('order');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ship_types');
    }
}
