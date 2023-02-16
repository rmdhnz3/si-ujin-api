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
        Schema::create('soal_jawabans', function (Blueprint $table) {
            $table->id();
            $table->integer("id_mapel");
            $table->integer("id_kelas");
            $table->integer("no_soal");
            $table->text("soal");
            $table->string("gambar");
            $table->text("pilihan_A");
            $table->text("pilihan_B");
            $table->text("pilihan_C");
            $table->text("pilihan_D");
            $table->text("pilihan_E");
            $table->integer("skor_benar");
            $table->integer("skor_salah");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soal_jawabans');
    }
};
