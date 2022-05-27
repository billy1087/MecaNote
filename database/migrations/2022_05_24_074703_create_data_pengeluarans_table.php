<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPengeluaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pengeluarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_akun');
            $table->string('nama_pengeluaran', 30);
            $table->smallInteger('jumlah');
            $table->float('harga_satuan');
            $table->string('keterangan', 50);
            $table->timestamps();

            $table->foreign('id_akun')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_pengeluarans');
    }
}
