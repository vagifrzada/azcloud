<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductFeatureTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('product_feature_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('feature_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            $table->text('description')->nullable();

            $table->unique(['feature_id', 'locale']);
            $table->foreign('feature_id')->references('id')->on('product_features')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('product_feature_translations', function (Blueprint $table) {
            $table->dropForeign(['feature_id']);
            $table->dropUnique(['feature_id', 'locale']);
        });

        Schema::dropIfExists('product_feature_translations');
    }
}
