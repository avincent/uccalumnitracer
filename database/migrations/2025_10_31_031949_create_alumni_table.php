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
        Schema::create('alumni', function (Blueprint $table) {
    $table->id();

    // Basic Info
    $table->string('student_id')->nullable(); // optional student number
    $table->string('first_name');
    $table->string('middle_name')->nullable();
    $table->string('last_name');
    $table->string('suffix')->nullable(); // Jr., III, etc.

    // Contact Info
    $table->string('email')->unique();
    $table->string('phone')->nullable();
    $table->string('address')->nullable();

    // Academic Info
    $table->string('course');
    $table->string('major')->nullable();
    $table->year('year_graduated');
    $table->string('section')->nullable();

    // Employment Info (optional, for alumni tracking)
    $table->string('employment_status')->nullable(); // e.g. Employed, Unemployed, Self-Employed
    $table->string('company_name')->nullable();
    $table->string('position')->nullable();

    // Other Details
    $table->string('profile_picture')->nullable(); // for storing image path
    $table->text('achievements')->nullable();
    $table->text('notes')->nullable();

    // Status Flags
    $table->boolean('is_verified')->default(false);
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni');
    }
};
