<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditionTitles extends Migration
{
    public function up()
    {
        Schema::create('edition_titles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('title_id');
            $table->foreign('title_id')->references('id')->on('titles')->onDelete('cascade');
            $table->string('edition_year');
            $table->string('edition_title');
            $table->string('slug', 120);
            $table->string('volume');
            $table->string('chapter');
            $table->integer('edition_no');
            $table->string('publish_date');
            $table->string('publish_month');
            $table->string('publish_year');
            $table->string('original_date');
            $table->string('call_number');
            $table->string('edition_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('edition_titles');
    }
}
