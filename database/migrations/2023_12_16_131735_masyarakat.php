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
        Schema::create('masyarakat', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('username', 100);
            $table->string('password', 100);
            $table->string('alamat', 100);
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('nik', 20)->unique();
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
