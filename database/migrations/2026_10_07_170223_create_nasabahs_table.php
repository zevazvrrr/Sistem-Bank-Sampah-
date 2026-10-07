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
        Schema::create('nasabahs', function (Blueprint $table) {
            if (!Schema::hasColumn('nasabah', 'status')) {
                $table->enum('status', ['aktif', 'tidak_aktif'])->default('aktif')->after('alamat');
            }
            if (!Schema::hasColumn('nasabah', 'created_at')) {
                $table->timestamps();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nasabah', function (Blueprint $table) {
            $table->dropColumn(['status', 'created_at', 'updated_at']);
        });
    }
};
