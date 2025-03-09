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
            $table->foreignId('lead_id')->constrained()->references('id')->on('leads')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->references('id')->on('users')->setNullOnDelete();
            $table->enum('type', ['message', 'call']);
            $table->foreignId('status_id')->constrained()->setNullOnDelete();
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
