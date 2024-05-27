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
        Schema::create('rental_house', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userID'); // Foreign Key
            $table->foreign('userID')->references('id')->on('users');
            $table->enum('sem', ['Semester 1','Semester 2']);
            $table->enum('session', ['2023/2024','2024/2025','2025/2026']);
            $table->string('people');
            $table->enum('accoType', ['Rental House','Parents House']);
            $table->string('accoAddress');
            $table->string('accoCity');
            $table->string('accoPoscode');
            $table->string('accoState');
            $table->string('emergencyContactNo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rental_house');
    }
};
