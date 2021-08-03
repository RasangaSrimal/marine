<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeClassificationsTable extends Migration
{
    public function up()
    {
        Schema::create('type_classifications', function (Blueprint $table) {
            $table->id();
            $table->string('type_code');
            $table->string('type_classification_contents');
            $table->integer('order');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('type_classifications');
    }
}
