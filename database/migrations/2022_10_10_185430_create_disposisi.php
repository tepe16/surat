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
            $table->integer('id_surat_masuk');
            $table->integer('id_pegawai');
            $table->string('tgl_penyelesaian',50);
            $table->string('tgl_kembali',50);
            $table->string('kembali_kepada',50);
            $table->string('intruksi',50);
            $table->string('sifat',50);
            $table->string('tujuan',50);
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
        Schema::dropIfExists('disposisi');
    }
};
