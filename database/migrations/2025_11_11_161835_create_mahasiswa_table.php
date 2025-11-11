<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mahasiswa', function (Blueprint $table) { // 🔹 ubah ke 'mahasiswa'
            $table->id();
            $table->string('nama');
            $table->string('nim')->unique();
            $table->string('jurusan');
            $table->string('email')->unique();
            $table->text('alamat');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mahasiswa'); // 🔹 ubah ke 'mahasiswa' juga
    }
};
