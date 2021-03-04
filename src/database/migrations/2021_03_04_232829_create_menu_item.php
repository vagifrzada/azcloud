<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuItem extends Migration
{
    public function up()
    {
        Schema::create('menu_item', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('menu_item_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menu_item_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('description')->nullable();

            $table->unique(['menu_item_id', 'locale']);
            $table->foreign('menu_item_id')->references('id')->on('menu_item')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('menu_item');
    }
}
