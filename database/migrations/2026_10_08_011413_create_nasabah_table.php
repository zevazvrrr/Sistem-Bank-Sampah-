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
        if (Schema::hasTable('nasabah')) {
            return;
        }

        Schema::create('nasabah', function (Blueprint $table) {
            $table->id('id_nasabah');
            $table->string('nama', 100);
            $table->string('no_telp', 20);
            $table->string('alamat')->nullable();
            $table->enum('status', ['aktif', 'tidak_aktif'])->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('nasabahs')) {
            Schema::dropIfExists('nasabah');
        }
    }
};
