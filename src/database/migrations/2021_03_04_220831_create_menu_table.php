<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url');
            $table->integer('order')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('menu_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menu_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');

            $table->unique(['menu_id', 'locale']);
            $table->foreign('menu_id')->references('id')->on('menu')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('menu_translations');
        Schema::dropIfExists('menu');
    }
}
