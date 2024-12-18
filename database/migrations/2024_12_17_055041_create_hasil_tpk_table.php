<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('hasil_tpk', function (Blueprint $table) {
            $table->id();
            $table->date('periode');
            $table->json('hasil_perhitungan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hasil_tpk');
    }
};
