<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');        // Name of the project/achievement
            $table->date('date_started')->nullable();   // Start date of the project
            $table->date('date_finished')->nullable();  // End date of the project
            $table->string('project_photo')->nullable(); // Path to project photo
            $table->string('credit_to')->nullable();     // Name of the alumni or batch responsible
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
