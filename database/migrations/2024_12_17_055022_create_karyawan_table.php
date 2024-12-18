<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('jam_kerja');
            $table->integer('evaluasi_terakhir');
            $table->integer('jumlah_pelayanan');
            $table->integer('lama_bekerja');
            $table->timestamps();
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('karyawan');
    }
};
