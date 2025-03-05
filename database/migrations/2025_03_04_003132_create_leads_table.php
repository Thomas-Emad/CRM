<?php

use App\Models\Group;
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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tags')->nullable();
            $table->string('address')->nullable();
            $table->string('position')->nullable();
            $table->string('city')->nullable();
            $table->string('email');
            $table->string('company')->nullable();
            $table->foreignId('group_id')->nullable()->constrained()->references('id')->on('groups')->noActionOnDelete();
            $table->string('website')->nullable();
            $table->string('phone')->nullable();
            $table->string('zip_code')->nullable();
            $table->double('lead_value')->default(0);
            $table->text('description')->nullable();
            $table->foreignId('status_id')->constrained()->references('id')->on('statuses')->noActionOnDelete();
            $table->foreignId('assigned_id')->nullable()->constrained()->references('id')->on('users')->noActionOnDelete();
            $table->foreignId('source_id')->nullable()->constrained()->references('id')->on('sources')->noActionOnDelete();
            $table->foreignId('country_id')->nullable()->constrained()->references('id')->on('countries')->noActionOnDelete();
            $table->foreignId('currency_id')->nullable()->constrained()->references('id')->on('currencies')->noActionOnDelete();
            $table->string('vat_number')->nullable();
            $table->boolean('is_customer')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
