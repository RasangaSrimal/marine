<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipsTable extends Migration
{
    public function up()
    {
        Schema::create('ships', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ship_type_id')->nullable();
            $table->foreign('ship_type_id')->references('id')->on('ship_types');
            $table->unsignedBigInteger('boat_type_master_id')->nullable();
            $table->foreign('boat_type_master_id')->references('id')->on('boat_type_masters');
            $table->unsignedBigInteger('use_id')->nullable();
            $table->foreign('use_id')->references('id')->on('use_ships');
            $table->unsignedBigInteger('navigation_area_id')->nullable();
            $table->foreign('navigation_area_id')->references('id')->on('navigation_areas');
            $table->string('name');
            $table->string('certificate_num')->nullable();
            $table->string('inspection_num')->nullable();
            $table->string('delivery_date')->nullable();
            $table->integer('gross_register_tonn')->nullable();
            $table->string('model')->nullable();
            $table->string('machine_num')->nullable();
            $table->string('registration_port')->nullable();
            $table->integer('length')->nullable();
            $table->integer('passengers_max_num')->nullable();
            $table->integer('other_passengers_max_num')->nullable();
            $table->integer('sailors_max_num')->nullable();
            $table->string('boat_no')->nullable();
            $table->date('registered_date')->nullable();
            $table->string('inspection_id')->nullable();
            $table->string('other_navigational_conditions')->nullable();
            $table->string('engine')->nullable();
            $table->string('engine_num_l')->nullable();
            $table->string('engine_num_r')->nullable();
            $table->string('location')->nullable();
            $table->date('inspection_date')->nullable();
            $table->date('inspection_date1')->nullable();
            $table->date('inspection_date2')->nullable();
            $table->date('inspection_date3')->nullable();
            $table->date('inspection_date4')->nullable();
            $table->date('inspection_date5')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ships');
    }
}
