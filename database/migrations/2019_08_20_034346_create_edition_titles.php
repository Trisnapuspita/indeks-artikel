<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditionTitles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edition_titles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title');
            $table->string('slug', 120);
            $table->string('city');
            $table->string('publisher');
            $table->integer('year');
            $table->string('featured_img');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('title_id');
            $table->foreign('title_id')->references('id')->on('titles')->onDelete('cascade');
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
