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
        Schema::create('apbdes', function (Blueprint $table) {
            $table->id();
            $table->year('tahun')->unique();
            $table->bigInteger('pendapatan_dd')->default(0);
            $table->bigInteger('pendapatan_add')->default(0);
            $table->bigInteger('pendapatan_pades')->default(0);
            $table->bigInteger('pendapatan_lain')->default(0);
            $table->bigInteger('belanja_pemerintahan')->default(0);
            $table->bigInteger('belanja_pembangunan')->default(0);
            $table->bigInteger('belanja_kemasyarakatan')->default(0);
            $table->bigInteger('belanja_pemberdayaan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apbdes');
    }
};
