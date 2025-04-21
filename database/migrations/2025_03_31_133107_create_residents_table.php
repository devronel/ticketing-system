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
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('phone_number');
            $table->string('email_address')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->string('civil_status');
            $table->date('birth_date');
            $table->integer('age');
            $table->string('religion');
            $table->string('occupation');
            $table->text('birth_place');
            $table->string('purok_area');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residents');
    }
};
