<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesCompanyClassificationsTable extends Migration
{
    public function up()
    {
        Schema::create('sales_company_classifications', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('name');
            $table->string('order');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales_company_classifications');
    }
}
