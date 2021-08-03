<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sales_in_charge_id')->nullable();
            $table->foreign('sales_in_charge_id')->references('id')->on('sales_in_charges');
            $table->unsignedBigInteger('job_title_id')->nullable();
            $table->foreign('job_title_id')->references('id')->on('job_titles');
            $table->string('name')->nullable();
            $table->string('kana')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('customers');
            $table->string('user_code')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('home_tel')->nullable();
            $table->string('tel')->nullable();
            $table->string('dm_issuance_cla')->nullable();
            $table->date('registered_date')->nullable();
            $table->boolean('is_company')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
