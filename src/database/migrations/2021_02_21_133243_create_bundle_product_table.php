<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBundleProductTable extends Migration
{
    public function up()
    {
        Schema::create('bundle_product', function (Blueprint $table) {
            $table->unsignedInteger('bundle_id');
            $table->unsignedInteger('product_id');

            $table->foreign('bundle_id')->references('id')->on('product_bundles')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('bundle_product', function (Blueprint $table) {
            $table->dropForeign(['bundle_id', 'product_id']);
        });

        Schema::dropIfExists('bundle_product');
    }
}
