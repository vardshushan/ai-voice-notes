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
    Schema::create('voice_notes', function (Blueprint $table) {
        $table->id();

        $table->foreignId('user_id')->constrained()->cascadeOnDelete();

        $table->string('title')->nullable();

        $table->string('audio_path');

        $table->longText('transcript')->nullable();
        $table->text('summary')->nullable();

        $table->string('language', 10)->nullable();

        $table->enum('status', ['pending', 'processing', 'completed', 'failed'])
              ->default('pending');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voice_notes');
    }
};
