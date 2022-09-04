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
        Schema::create('surat_masuk', function (Blueprint $table) {
            $table->increments('id_surat_masuk');
            $table->string('no_surat_masuk',25);
            $table->integer('id_bagian');
            $table->integer('id_jenis_surat');
            $table->integer('id_pegawai');
            $table->integer('id_instansi');
            $table->date('tgl_surat');
            $table->date('tgl_masuk');
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
        Schema::dropIfExists('surat_masuk');
    }
};
