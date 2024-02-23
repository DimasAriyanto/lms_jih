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
        Schema::create('pelatihan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi');
            $table->string('image_url');
            $table->string('modul_pelatihan');
            $table->date('tanggal_pelaksanaan');
            $table->enum('tipe_pelaksanaan', ['online', 'offline']);
            $table->string('link_online')->nullable();
            $table->text('tempat_pelaksanaan')->nullable();
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->enum('jenis_pelaksanaan', ['terbatas', 'umum']);
            $table->integer('kuota');
            $table->dateTime('tanggal_mulai_pendaftaran');
            $table->dateTime('tanggal_akhir_pendaftaran');
            $table->float('harga');
            $table->integer('diskon')->default(0);
            $table->enum('status_pendaftaran', ['buka', 'tutup'])->default('buka');
            $table->enum('status_kuota', ['tersedia', 'penuh'])->default('tersedia');
            $table->enum('status_pelaksanaan', ['selesai', 'proses', 'batal'])->default('proses');
            $table->foreignId('kategori_id')->constrained(table: 'kategori');
            $table->foreignId('user_id')->constrained(table: 'users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelatihan');
    }
};
