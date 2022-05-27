<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Null_;

class CreateDataRekapTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_rekap_transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pemasukan')->nullable();
            $table->foreignId('id_piutang')->nullable();
            $table->foreignId('id_pengeluaran')->nullable();
            $table->foreignId('id_hutang')->nullable();
            $table->timestamps();

            $table->foreign('id_pemasukan')->references('id')->on('data_pemasukans');
            $table->foreign('id_piutang')->references('id')->on('data_piutangs');
            $table->foreign('id_pengeluaran')->references('id')->on('data_pengeluarans');
            $table->foreign('id_hutang')->references('id')->on('data_hutangs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_rekap_transaksis');
    }
}
