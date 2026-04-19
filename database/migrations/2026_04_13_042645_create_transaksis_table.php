<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PHPUnit\Framework\Constraint\Constraint;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kendaraan_id')->constrained ('kendaraans');
            $table->foreignId('tarif_id')->constrained('tarifs');
            $table->foreignId('area_parkir-id')->constrained('area_parkirs');
            
            $table->dateTime('waktu_masuk');
            $table->dateTime('waktu_keluar')->nullable();
            
            $table->integer('durasi')->nullable();
            $table->decimal('biaya', 10, 2)->nullable();

            $table->foreignId('user_id')->constrained('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
