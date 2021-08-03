<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('customers');
            $table->unsignedBigInteger('ship_id')->nullable();
            $table->foreign('ship_id')->references('id')->on('ships');
            $table->unsignedBigInteger('delivery_date_id')->nullable();
            $table->foreign('delivery_date_id')->references('id')->on('estimated_delivery_dates');
            $table->unsignedBigInteger('delivery_place_id')->nullable();
            $table->foreign('delivery_place_id')->references('id')->on('estimated_delivery_places');
            $table->unsignedBigInteger('payment_terms_id')->nullable();
            $table->foreign('payment_terms_id')->references('id')->on('estimated_payment_terms');
            $table->unsignedBigInteger('expense_detail_id')->nullable();
            $table->foreign('expense_detail_id')->references('id')->on('expense_details');
            $table->string('user_code')->nullable();
            $table->string('hull_num')->nullable();
            $table->integer('discount')->nullable();        
            $table->string('estimate_num')->nullable();
            $table->date('estimate_date')->nullable();
            $table->date('expiration_date')->nullable();
            $table->string('estimated_amount')->nullable();
            $table->string('estimated_subject')->nullable();
            $table->date('created_date')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quotations');
    }
}
