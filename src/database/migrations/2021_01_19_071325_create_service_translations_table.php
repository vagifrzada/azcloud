<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('service_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('service_id')->unsigned();
            $table->string('locale')->index();
            $table->string('slug');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('content')->nullable();

            $table->unique(['service_id', 'locale', 'slug']);
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('service_translations', function (Blueprint $table) {
            $table->dropForeign(['service_id']);
            $table->dropUnique(['service_id', 'locale', 'slug']);
        });
        Schema::drop('service_translations');
    }
}
