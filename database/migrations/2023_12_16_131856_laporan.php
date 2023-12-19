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
        //
        Schema::create('laporan', function (Blueprint $table) {
            $table->id('id_lp');
            $table->string('nama_terlapor', 100);
            $table->string('judul_perkara', 100);
            $table->string('status', 100);
            $table->longText('deskripsi');
            $table->string('hasil', 100);
            $table->date('tanggal');
            $table->string('rujukan');
            $table->integer('id_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
