<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateEditionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('edition_titles', function (Blueprint $table) {
            $table->string('updated_by')->after('edition_image');
        });
        Schema::table('article_editions', function (Blueprint $table) {
            $table->string('updated_by')->after('detail_img');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('edition_titles', function (Blueprint $table) {
            $table->string('updated_by')->after('edition_image');
        });
        Schema::table('article_editions', function (Blueprint $table) {
            $table->string('updated_by')->after('detail_img');
        });
    }
}
