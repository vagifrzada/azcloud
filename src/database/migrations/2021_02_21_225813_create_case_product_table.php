<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseProductTable extends Migration
{
    public function up()
    {
        Schema::create('case_product', function (Blueprint $table) {
            $table->unsignedInteger('case_id');
            $table->unsignedInteger('product_id');

            $table->foreign('case_id')->references('id')->on('product_cases')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('case_product');
    }
}
