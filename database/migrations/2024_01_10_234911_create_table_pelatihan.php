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
            $table->date('tanggal_pelaksanaan');
            $table->text('tempat_pelaksanaan');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->enum('jenis_pelaksanaan', ['terbatas', 'umum']);
            $table->integer('kuota');
            $table->date('tanggal_mulai_pendaftaran');
            $table->date('tanggal_akhir_pendaftaran');
            $table->float('harga')->default(0);
            $table->integer('diskon')->default(0);
            $table->enum('status_pelaksanaan', ['selesai', 'proses', 'batal'])->default('proses');
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('kategori_id')->references('id')->on('kategori');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
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
