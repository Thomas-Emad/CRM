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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company')->nullable();
            $table->string('parent_account')->nullable();
            $table->string('contractor')->nullable();
            $table->string('developer')->nullable();
            $table->string('consultant')->nullable();
            $table->string('investor')->nullable();
            $table->string('architect')->nullable();
            $table->string('industry')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->foreignId('country_id')->nullable()->constrained()->references('id')->on('countries')->noActionOnDelete();

            // Contact Person
            $table->string('person_name')->nullable();
            $table->string('person_phone')->nullable();
            $table->string('person_email')->nullable();
            $table->string('person_position')->nullable();

            // Steps
            $table->string('next_step')->nullable();
            $table->string('next_step_date')->nullable();
            $table->text('step_description')->nullable();
            $table->string('decision_makers')->nullable();
            $table->enum('section', ['private', 'military'])->default('private');

            $table->foreignId('status_id')->constrained()->references('id')->on('statuses')->noActionOnDelete();
            $table->foreignId('source_id')->nullable()->constrained()->references('id')->on('sources')->noActionOnDelete();
            $table->foreignId('lead_type_id')->nullable()->constrained()->references('id')->on('lead_types')->noActionOnDelete();
            $table->foreignId('lead_unit_id')->nullable()->constrained()->references('id')->on('lead_units')->noActionOnDelete();
            $table->foreignId('team_id')->nullable()->constrained()->references('id')->on('teams')->noActionOnDelete();
            $table->foreignId('assigned_id')->nullable()->constrained()->references('id')->on('users')->noActionOnDelete();

            $table->integer('priority')->nullable();
            $table->date('date_acquired')->nullable();
            $table->double('lead_value')->default(0);
            $table->text('project_brief')->nullable();

            $table->boolean('is_customer')->default(false);
            $table->timestamp('customer_since')->nullable();
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
