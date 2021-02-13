<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataCentersTable extends Migration
{
    public function up()
    {
        Schema::create('data_centers', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('status');
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_centers');
    }
}
