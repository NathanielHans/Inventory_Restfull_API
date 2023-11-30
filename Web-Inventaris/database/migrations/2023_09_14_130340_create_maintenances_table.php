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
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_maintenance');
            $table->string('maintenance');
            $table->date('tanggal_maintenance');
            $table->unsignedBigInteger('id_barang');
            $table->unsignedBigInteger('id_user');

            $table->timestamps();

            $table->foreign('id_barang')->references('id')->on('barangs')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};
