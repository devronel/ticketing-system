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
        Schema::create('blotter_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('complainant_id')->nullable()->constrained('residents', 'id');
            $table->foreignId('respondent_id')->nullable()->constrained('residents', 'id');
            $table->string('complainant_name');
            $table->string('respondent_name');
            $table->string('incident_type');
            $table->text('incident_details');
            $table->dateTime('incident_date');
            $table->string('action_taken')->nullable();
            $table->enum('status', ['pending', 'resolved', 'dismissed']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blotter_records');
    }
};
