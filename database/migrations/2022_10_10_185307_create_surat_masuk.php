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
            $table->integer('id_kode_surat');
            $table->integer('id_pegawai');
            $table->string('asal_surat',50);
            $table->string('tgl_masuk',50);
            $table->string('perihal',50);
            $table->string('lembar_surat',50);
            $table->string('lampiran',50);
            $table->text('file');
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
        Schema::dropIfExists('surat_masuk');
    }
};
