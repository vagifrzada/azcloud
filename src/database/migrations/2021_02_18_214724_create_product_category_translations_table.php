<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCategoryTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('product_category_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            $table->text('description')->nullable();

            $table->unique(['category_id', 'locale']);
            $table->foreign('category_id')->references('id')
                ->on('product_category')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('product_category_translations', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropUnique(['category_id', 'locale']);
        });

        Schema::dropIfExists('product_category_translations');
    }
}
