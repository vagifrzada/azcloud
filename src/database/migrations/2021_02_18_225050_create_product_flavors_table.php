<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductFlavorsTable extends Migration
{
    public function up()
    {
        Schema::create('product_flavors', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('product_id');
            $table->string('type');
            $table->string('flavor_id')->index();
            $table->string('name');
            $table->string('family')->nullable();
            $table->double('monthly_price', 10, 2, true);
            $table->double('hourly_price', 10, 3, true);
            $table->integer('cpu')->nullable();
            $table->integer('ram')->nullable();
            $table->integer('disk')->nullable();
            $table->integer('size')->nullable();
            $table->boolean('isWindowsOnly')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('product_id')->references('id')
                ->on('products');
        });
    }

    public function down()
    {
        Schema::table('product_flavors', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
        });

        Schema::dropIfExists('product_flavors');
    }
}
