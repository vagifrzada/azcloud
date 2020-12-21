<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('post_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            $table->string('slug');
            $table->text('content')->nullable();

            $table->unique(['post_id', 'locale', 'slug']);
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('post_translations', function (Blueprint $table) {
            $table->dropForeign(['post_id']);
            $table->dropUnique(['post_id', 'locale', 'slug']);
        });

        Schema::drop('post_translations');
    }
}
