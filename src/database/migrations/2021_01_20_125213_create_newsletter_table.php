<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsletterTable extends Migration
{
    public function up()
    {
        Schema::create('newsletter', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->ipAddress('ip');
            $table->timestamp('subscribed_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('newsletter');
    }
}
