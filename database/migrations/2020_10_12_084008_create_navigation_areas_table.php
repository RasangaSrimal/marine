<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavigationAreasTable extends Migration
{
    public function up()
    {
        Schema::create('navigation_areas', function (Blueprint $table) {
            $table->id();
            $table->string('area_name');
            $table->integer('order');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('navigation_areas');
    }
}
