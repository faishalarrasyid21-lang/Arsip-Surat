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
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
            $table->string('nomor_surat');
            $table->date('tanggal_surat');
            $table->string('perihal');
            $table->string('pengirim');
            $table->text('keterangan')->nullable();
            $table->string('file_path')->nullable();
            $table->string('nama_anda')->nullable();
            $table->string('nim_anda')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
