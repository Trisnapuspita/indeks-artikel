<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleEditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_editions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('edition_title_id');
            $table->foreign('edition_title_id')->references('id')->on('edition_titles')->onDelete('cascade');
            $table->string('article_title');
            $table->string('subject');
            $table->string('writer');
            $table->bigInteger('pages');
            $table->bigInteger('column');
            $table->string('source');
            $table->text('desc');
            $table->string('keyword');
            $table->string('detail_img');
            $table->boolean('verification')->default(FALSE);
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
        Schema::dropIfExists('article_editions');
    }
}
