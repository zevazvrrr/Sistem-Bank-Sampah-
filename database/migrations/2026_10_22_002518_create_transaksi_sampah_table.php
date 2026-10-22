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
        Schema::create('transaksi_sampah', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->unsignedBigInteger('id_nasabah');
            $table->date('tanggal_transaksi');
            $table->string('jenis_sampah', 100);
            $table->decimal('berat_kg', 8, 2);           // berat dalam kg
            $table->integer('harga_per_kg');              // harga saat transaksi
            $table->integer('subtotal');                  // berat * harga_per_kg
            $table->text('catatan')->nullable();
            $table->timestamps();

            $table->foreign('id_nasabah')
                  ->references('id_nasabah')
                  ->on('nasabah')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_sampah');
    }
};
