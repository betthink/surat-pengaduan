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
        Schema::create('admin', function (Blueprint $table) {
            $table->id('id_adm');
            $table->string('nama', 100);
            $table->string('username', 100);
            $table->string('password', 100);
            $table->string('level', 20)->default('admin');
            $table->string('status', 10)->nullable()->default('off');
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
