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
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelatihan_id')->constrained(table: 'pelatihan');
            $table->foreignId('user_id')->constrained(table: 'users');
            $table->timestamp('tanggal_pendaftaran')->default(now());
            $table->timestamp('tanggal_pembayaran')->nullable();
            $table->float('total_pembayaran')->default(0);
            $table->string('metode_pembayaran')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};
