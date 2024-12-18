<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('status_pesanans', function (Blueprint $table) {
            $table->id('id_status'); // ID Status sebagai primary key
            $table->unsignedBigInteger('id_pesanan'); // ID Pesanan sebagai foreign key
            $table->string('nama_pemesan'); // Nama pemesan
            $table->text('detail_pesanan'); // Detail pesanan
            $table->string('status'); // Status pesanan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_pesanans');
    }
};
