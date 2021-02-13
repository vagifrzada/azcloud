<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataCenterTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('data_center_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('data_center_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('content')->nullable();

            $table->unique(['data_center_id', 'locale']);
            $table->foreign('data_center_id')->references('id')->on('data_centers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('data_center_translations', function (Blueprint $table) {
            $table->dropForeign(['data_center_id']);
            $table->dropUnique(['data_center_id', 'locale']);
        });
        Schema::dropIfExists('data_center_translations');
    }
}
