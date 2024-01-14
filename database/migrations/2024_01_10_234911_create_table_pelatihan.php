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
            $table->enum('jenis_kuota', ['limitid', 'unlimited']);
            $table->integer('kuota');
            $table->enum('jenis_pelaksanaan', ['khuhus', 'umum']);
            $table->enum('status_selesai', ['sudah', 'belum'])->default('belum');
            $table->enum('status_acc', ['disetujui', 'menunggu', 'ditolak'])->default('menunggu');
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
