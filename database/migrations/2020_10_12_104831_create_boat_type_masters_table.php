<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoatTypeMastersTable extends Migration
{
    public function up()
    {
        Schema::create('boat_type_masters', function (Blueprint $table) {
            $table->id();
            $table->string('boat_type_selection');
            $table->string('extracted_data');
            $table->string('name');
            $table->string('product_code');
            $table->string('bu_classification');
            $table->string('class');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('boat_type_masters');
    }
}
