<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUseShipsTable extends Migration
{
    public function up()
    {
        Schema::create('use_ships', function (Blueprint $table) {
            $table->id();
            $table->string('usage_name');
            $table->integer('order');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('use_ships');
    }
}
