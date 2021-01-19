<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('status')->default(0);
            $table->integer('price');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('services');
    }
}
