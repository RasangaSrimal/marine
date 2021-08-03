<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLimitedCoastalAreasTable extends Migration
{
    public function up()
    {
        Schema::create('limited_coastal_areas', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('area_name');
            $table->integer('order');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('limited_coastal_areas');
    }
}
