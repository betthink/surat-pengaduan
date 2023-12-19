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
        Schema::create('kata_kunci', function (Blueprint $table) {
            $table->renameColumn('id_kk', 'id');
            $table->string('kata', 100);
            $table->string('kategori', 100);
            $table->string('keterangan', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::create('kata_kunci', function (Blueprint $table) {
            $table->renameColumn('id', 'id_kk');
            $table->string('kata', 100);
            $table->string('kategori', 100);
            $table->string('keterangan', 100);
        });
    }
};
