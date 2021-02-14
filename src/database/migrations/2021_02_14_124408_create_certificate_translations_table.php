<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificateTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('certificate_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('certificate_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            $table->text('content')->nullable();

            $table->unique(['certificate_id', 'locale']);
            $table->foreign('certificate_id')->references('id')->on('certificates')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('certificate_translations', function (Blueprint $table) {
            $table->dropForeign(['certificate_id']);
            $table->dropUnique(['certificate_id', 'locale']);
        });
        Schema::dropIfExists('certificate_translations');
    }
}
