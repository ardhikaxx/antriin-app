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
        Schema::create('antrains', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->nullable()->constrained('bookings');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('layanan_id')->constrained('layanans');
            $table->string('nomor_antrian', 10);
            $table->date('tanggal');
            $table->time('estimasi_waktu')->nullable();
            $table->enum('status', ['menunggu', 'dipanggil', 'dilayani', 'selesai', 'dibatalkan'])->default('menunggu');
            $table->boolean('is_walkin')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antrains');
    }
};
