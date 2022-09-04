<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keluar', function (Blueprint $table) {
            $table->increments('id_surat_keluar');
            $table->string('no_surat_keluar',25);
            $table->integer('id_jenis_surat');
            $table->integer('id_pegawai');
            $table->integer('id_instansi');
            $table->date('tgl_surat');
            $table->string('perihal',20);
            $table->text('file');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_keluar');
    }
};
