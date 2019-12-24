<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSomeTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('article_editions', function (Blueprint $table) {
            $table->dropForeign('article_editions_edition_title_id_foreign');
            $table->foreign('edition_title_id')->references('id')->on('edition_titles')->onDelete('restrict');
        });

        Schema::table('edition_titles', function (Blueprint $table) {
            $table->dropForeign('edition_titles_title_id_foreign');
            $table->foreign('title_id')->references('id')->on('titles')->onDelete('restrict');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('article_editions_edition_title_id_foreign');
        $table->foreign('edition_title_id')->references('id')->on('edition_titles')->onDelete('cascade');
        
        $table->dropForeign('edition_titles_title_id_foreign');
        $table->foreign('title_id')->references('id')->on('titles')->onDelete('cascade');
    }
}
