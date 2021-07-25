<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToHeaderJournals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('header_journals', function (Blueprint $table) {
            $table->unsignedBigInteger('status_header_id')->nullable();
            $table->foreign('status_header_id')->references('id')->on('status_headers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('header_journals', function (Blueprint $table) {
            //
        });
    }
}
