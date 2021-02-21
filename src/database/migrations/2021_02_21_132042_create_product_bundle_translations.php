<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductBundleTranslations extends Migration
{
    public function up()
    {
        Schema::create('product_bundle_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bundle_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('options')->nullable();

            $table->unique(['bundle_id', 'locale']);
            $table->foreign('bundle_id')->references('id')->on('product_bundles')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('product_bundle_translations', function (Blueprint $table) {
            $table->dropForeign(['bundle_id']);
            $table->dropUnique(['bundle_id', 'locale']);
        });

        Schema::dropIfExists('product_bundle_translations');
    }
}
