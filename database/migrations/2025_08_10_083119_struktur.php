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
        Schema::create('struktur_organisasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 255);
            $table->string('jabatan', 255);
            $table->integer('urutan')->default(0);
            $table->string('foto', 255)->nullable();
            $table->foreignId('komisariat_id')->nullable()->constrained('komisariat')->nullOnDelete();
            $table->string('periode', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('struktur_organisasi');
    }
};
