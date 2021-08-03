<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('customers');
            $table->unsignedBigInteger('ship_id')->nullable();
            $table->foreign('ship_id')->references('id')->on('ships');
            $table->unsignedBigInteger('sales_in_charge_id')->nullable();
            $table->foreign('sales_in_charge_id')->references('id')->on('sales_in_charges');
            $table->unsignedBigInteger('service_in_charge_id')->nullable();
            $table->foreign('service_in_charge_id')->references('id')->on('service_in_charges');
            $table->unsignedBigInteger('service_store_id')->nullable();
            $table->foreign('service_store_id')->references('id')->on('outsourced_service_stores');
            $table->unsignedBigInteger('expense_detail_id')->nullable();
            $table->foreign('expense_detail_id')->references('id')->on('expense_details');
            $table->string('request_details')->nullable();        
            $table->integer('file_no')->nullable();        
            $table->integer('discount')->nullable();        
            $table->string('request_amount')->nullable();        
            $table->date('created_date')->nullable();        
            $table->date('due_date')->nullable();        
            $table->string('usage_time')->nullable();        
            $table->date('sales_date')->nullable();        
            $table->date('delivery_date')->nullable();        
            $table->integer('travel_expense')->nullable();        
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
