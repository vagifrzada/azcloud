<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBenefitProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benefit_product', function (Blueprint $table) {
            $table->unsignedInteger('benefit_id');
            $table->unsignedInteger('product_id');

            $table->foreign('benefit_id')->references('id')->on('product_benefits')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('benefit_product', function (Blueprint $table) {
            $table->dropForeign(['benefit_id', 'product_id']);
        });

        Schema::dropIfExists('benefit_product');
    }
}
