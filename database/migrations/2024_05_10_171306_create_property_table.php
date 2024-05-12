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
         Schema::create('property', function (Blueprint $table) {
            $table->id('propertyID');
            // $table->unsignedBigInteger('complaintID'); // Foreign Key
            // $table->foreign('complaintID')->references('id')->on('complaint');
            $table->string('propertyName')->nullable();
            $table->string('propertyType')->nullable();
            $table->string('propertyAddress')->nullable();
            $table->string('city')->nullable();
            $table->string('poscode')->nullable();
            $table->string('state')->nullable();
            $table->string('noPeople')->nullable();
            $table->string('gender')->nullable();
            $table->string('race')->nullable();
            $table->string('bedroom')->nullable();
            $table->string('bathroom')->nullable();
            $table->string('propertyFurnish')->nullable();
            $table->string('propertyImage')->nullable();
            $table->string('propertyRentPrice')->nullable();
            $table->string('propertyDesc')->nullable();
            $table->string('ownerPhoneNo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property');
    }
};
