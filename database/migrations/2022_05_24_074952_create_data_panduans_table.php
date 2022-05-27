<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPanduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_panduans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_akun');
            $table->string('judul_panduan', 50);
            $table->text('isi_panduan');
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
        Schema::dropIfExists('data_panduans');
    }
}
