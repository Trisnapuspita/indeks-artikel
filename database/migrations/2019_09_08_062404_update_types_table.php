<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('title_type', function (Blueprint $table) {
            $table->dropForeign('title_type_type_id_foreign');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('restrict');
        });

        Schema::table('time_title', function (Blueprint $table) {
            $table->dropForeign('time_title_time_id_foreign');
            $table->foreign('time_id')->references('id')->on('times')->onDelete('restrict');
        });

        Schema::table('format_title', function (Blueprint $table) {
            $table->dropForeign('format_title_format_id_foreign');
            $table->foreign('format_id')->references('id')->on('formats')->onDelete('restrict');
        });

        Schema::table('article_edition_status', function (Blueprint $table) {
            $table->dropForeign('article_edition_status_status_id_foreign');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('restrict');
        });

    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('title_type_type_id_foreign');
        $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');

        $table->dropForeign('time_title_time_id_foreign');
        $table->foreign('time_id')->references('id')->on('times')->onDelete('cascade');

        $table->dropForeign('format_title_format_id_foreign');
        $table->foreign('format_id')->references('id')->on('formats')->onDelete('cascade');

        $table->dropForeign('article_edition_status_status_id_foreign');
        $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');


    }
}
