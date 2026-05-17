<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pendaftar', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('asal_sekolah');
            $table->text('alamat');
            $table->string('no_telp');
            $table->string('pernah_ikut'); // Ya / Tidak
            $table->json('opsi_alat')->nullable(); // Menyimpan pilihan alat dalam bentuk array/json
            $table->string('bersedia_latihan'); // Ya / Tidak
            $table->text('kesan_sebelumnya')->nullable();
            $table->text('alasan_bergabung');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('pendaftar');
    }
};
