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
        Schema::table('apbdes', function (Blueprint $table) {
            $table->bigInteger('realisasi_pemerintahan')->default(0)->after('belanja_pemberdayaan');
            $table->bigInteger('realisasi_pembangunan')->default(0)->after('realisasi_pemerintahan');
            $table->bigInteger('realisasi_kemasyarakatan')->default(0)->after('realisasi_pembangunan');
            $table->bigInteger('realisasi_pemberdayaan')->default(0)->after('realisasi_kemasyarakatan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('apbdes', function (Blueprint $table) {
            $table->dropColumn([
                'realisasi_pemerintahan',
                'realisasi_pembangunan',
                'realisasi_kemasyarakatan',
                'realisasi_pemberdayaan'
            ]);
        });
    }
};
