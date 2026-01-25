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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_id')->unique();
            $table->string('name');
            $table->string('nik')->nullable();
            $table->string('phone');
            $table->string('category');
            $table->string('subject');
            $table->text('description');
            $table->string('image')->nullable();
            $table->boolean('is_anonymous')->default(false);
            $table->enum('status', ['pending', 'processed', 'completed', 'rejected'])->default('pending');
            $table->text('admin_response')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
