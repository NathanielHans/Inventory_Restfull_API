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
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->text('isi_pengajuan');
            $table->string('nama');
            $table->string('status')->default('Belum Konfirmasi');
            $table->date('tanggal_pengajuan');
            $table->unsignedBigInteger('id_barang');

            $table->foreign('id_barang')->references('id')->on('barangs');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};
