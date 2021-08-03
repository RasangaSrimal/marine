<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimatedPaymentTermsTable extends Migration
{
    public function up()
    {
        Schema::create('estimated_payment_terms', function (Blueprint $table) {
            $table->id();
            $table->string('payment_terms');
            $table->integer('order');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('estimated_payment_terms');
    }
}
