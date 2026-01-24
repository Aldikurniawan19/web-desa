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
        Schema::create('potensis', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->enum('category', ['wisata', 'umkm', 'pertanian']);
            $table->text('description');
            $table->string('image')->nullable();
            $table->string('owner')->nullable();
            $table->string('contact')->nullable();
            $table->string('location')->nullable();
            $table->decimal('price', 12, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('potensis');
    }
};
