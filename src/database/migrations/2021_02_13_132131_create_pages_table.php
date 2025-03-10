<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identity')->nullable();
            $table->boolean('status')->default(true);
        });
    }

    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
