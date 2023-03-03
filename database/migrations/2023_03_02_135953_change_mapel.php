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
     public function up(): void
    {
        Schema::table('mapels', function (Blueprint $table) {
            $table->dropColumn('kelas_jurusan');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('siswas', function (Blueprint $table) {
            $table->dropColumn('kelas_id');
        });
    }
};
