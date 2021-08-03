<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEngineModelListsTable extends Migration
{
    public function up()
    {
        Schema::create('engine_model_lists', function (Blueprint $table) {
            $table->id();
            $table->string('model_selection');
            $table->string('model');
            $table->string('classification');
            $table->integer('order');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('engine_model_lists');
    }
}
