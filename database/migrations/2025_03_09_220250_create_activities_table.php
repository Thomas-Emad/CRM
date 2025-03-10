<?php

use App\Enums\ActivityTypeEnum;
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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lead_id')->constrained()->references('id')->on('leads')->cascadeOnDelete();
            $table->foreignId("assigned_id")->nullable()->constrained()->references('id')->on('users')->setNullOnDelete();
            $table->foreignId("creator_id")->nullable()->constrained()->references('id')->on('users')->setNullOnDelete();
            $table->integer('reminder')->nullable();
            $table->enum('type', [ActivityTypeEnum::Calls->value, ActivityTypeEnum::Meetings->value, ActivityTypeEnum::Task->value])->nullable();
            $table->morphs('activityable');
            $table->integer('title')->nullable();
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
