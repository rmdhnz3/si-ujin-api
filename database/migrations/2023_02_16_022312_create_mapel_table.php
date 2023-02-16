<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
    {
        Schema::create('mapels', function (Blueprint $table) {
            $table->id();
            $table->string('mapel');
            $table->integer('durasi');
            $table->string('kelas_jurusan');
            $table->string('gambar');
            $table->integer('jumlah_soal');
            $table->dateTime('waktu_mulai');
            $table->dateTime('waktu_akhir');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mapels');
    }
};
