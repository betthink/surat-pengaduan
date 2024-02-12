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
        Schema::table('masyarakat', function (Blueprint $table) {
            //
            $table->string('nomor_telp', 20)->after('alamat')->nullable();
            $table->string('jenis_kelamin', 20)->after('nomor_telp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('masyarakat', function (Blueprint $table) {
            //
            $table->dropColumn(['nomor_telp', 'jenis_kelamin']);
        });
    }
};
