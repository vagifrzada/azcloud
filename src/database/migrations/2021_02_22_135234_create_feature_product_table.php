<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeatureProductTable extends Migration
{
    public function up()
    {
        Schema::create('feature_product', function (Blueprint $table) {
            $table->unsignedInteger('feature_id');
            $table->unsignedInteger('product_id');

            $table->foreign('feature_id')->references('id')->on('product_features')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('feature_product', function (Blueprint $table) {
            $table->dropForeign(['feature_id', 'product_id']);
        });

        Schema::dropIfExists('feature_product');
    }
}
