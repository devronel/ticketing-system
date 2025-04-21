<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('certificate_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resident_id')->constrained('residents', 'id');
            $table->foreignId('certificate_type_id')->constrained('certificate_types', 'id');
            $table->json('form_data');
            $table->enum('status', ['Pending', 'Approved', 'Rejected', 'Released'])->default('Pending');
            $table->text('remarks')->nullable();
            $table->string('or_number')->nullable();
            $table->dateTime('requested_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('approved_at')->nullable();
            $table->dateTime('released_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_requests');
    }
};
