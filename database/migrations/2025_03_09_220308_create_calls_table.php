<?php

use App\Enums\CallTypesEnum;
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
        Schema::create('calls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('call_reason_id')->nullable()->constrained()->references('id')->on('call_reasons')->noActionOnDelete();
            $table->foreignId('call_response_id')->nullable()->constrained()->references('id')->on('call_responses')->noActionOnDelete();
            $table->timestamp('call_date');
            $table->integer("duration_call")->nullable();
            $table->enum('type', [CallTypesEnum::InComing->value, CallTypesEnum::OutGoing->value, CallTypesEnum::Missing->value])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calls');
    }
};
