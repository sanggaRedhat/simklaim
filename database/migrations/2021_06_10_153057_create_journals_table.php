<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('header_journals_id')->constrained('header_journals');
            $table->float('debet');
            $table->float('kredit');
            $table->string('keterangan');
            $table->date('tanggal_transaksi');
            $table->foreignId('debet_code_id')->constrained('codes');
            $table->foreignId('kredit_code_id')->constrained('codes');
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
        // Schema::table('journals', function (Blueprint $table) {
        //     $table->dropForeign('journals_debet_code_id_foreign');
        //     $table->dropForeign('journals_header_journals_id_foreign');
        //     $table->dropForeign('journals_kredit_code_id_foreign');
        // });
        // Schema::dropIfExists('vjournal');
        Schema::dropIfExists('journals');
    }
}
