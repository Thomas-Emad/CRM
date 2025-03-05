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
        Schema::create('interactives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lead_id')->constrained()->references('id')->on('leads')->noActionOnDelete();
            $table->foreignId('user_id')->constrained()->references('id')->on('users')->noActionOnDelete();
            $table->enum('type', ['message', 'call']);
            $table->foreignId('status_id')->constrained()->noActionOnDelete();
            $table->string('title');
            $table->text('content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interactives');
    }
};
