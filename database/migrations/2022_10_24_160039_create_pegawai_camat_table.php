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
        Schema::create('pegawai_camat', function (Blueprint $table) {
            $table->increments('id_pegawai_camat');
            $table->string('nama_pegawai_camat',50);
            $table->string('nip',50);
            $table->string('username',50);
            $table->string('password',50);
            $table->string('level',50);
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
        Schema::dropIfExists('pegawai_camat');
    }
};
