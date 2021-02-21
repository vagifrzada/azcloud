<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCaseTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('product_case_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('use_case_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');

            $table->unique(['use_case_id', 'locale']);
            $table->foreign('use_case_id')->references('id')->on('product_cases')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('product_case_translations', function (Blueprint $table) {
            $table->dropForeign(['use_case_id']);
            $table->dropUnique(['use_case_id', 'locale']);
        });

        Schema::dropIfExists('product_case_translations');
    }
}
