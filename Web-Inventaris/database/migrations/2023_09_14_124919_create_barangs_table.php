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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->string('merk_type');
            $table->string('kategori');
            $table->string('status')->default('Baik');
            $table->decimal('harga_beli', 10, 2); // Tambahkan kolom harga_beli
            $table->date('tanggal_pembelian'); // Tambahkan kolom tanggal_pembelian
            $table->date('tanggal_registrasi'); // Tambahkan kolom tanggal_pembelian
            $table->string('ruangan');
            $table->string('penanggung_jawab');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
