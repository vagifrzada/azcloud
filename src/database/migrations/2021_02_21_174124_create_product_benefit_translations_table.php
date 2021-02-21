<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductBenefitTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('product_benefit_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('benefit_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            $table->text('description')->nullable();

            $table->unique(['benefit_id', 'locale']);
            $table->foreign('benefit_id')->references('id')->on('product_benefits')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('product_benefit_translations', function (Blueprint $table) {
            $table->dropForeign(['benefit_id']);
            $table->dropUnique(['benefit_id', 'locale']);
        });

        Schema::dropIfExists('product_benefit_translations');
    }
}
