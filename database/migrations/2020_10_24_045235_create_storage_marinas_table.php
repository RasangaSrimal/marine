<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStorageMarinasTable extends Migration
{
    public function up()
    {
        Schema::create('storage_marinas', function (Blueprint $table) {
            $table->id();
            $table->string('storage_code');
            $table->string('storage_location');
            $table->integer('order');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('storage_marinas');
    }
}
