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
        Schema::create('disposisi', function (Blueprint $table) {
            $table->increments('id_disposisi');
            $table->string('no_surat',25);
            $table->integer('id_bagian');
            $table->integer('id_jenis_surat');
            $table->integer('id_instansi');
            $table->integer('id_pegawai');
            $table->date('tgl_surat');
            $table->date('tgl_terima');
            $table->string('perihal',20);
            $table->string('sifat',20);
            $table->string('rahasia',20);
            $table->string('tujuan',100);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disposisi');
    }
};
