<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumptionTaxesTable extends Migration
{
    public function up()
    {
        Schema::create('consumption_taxes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('tax_rate');
            $table->dateTime('date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('consumption_taxes');
    }
}
