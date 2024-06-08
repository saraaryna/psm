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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('studentID')->nullable();
            $table->string('ic')->unique();
            $table->enum('program', ['Diploma in Computer Science','Bachelor of Computer Science (Software Engineering) with Honours', 'Bachelor of Computer Science (Computer Systems & Networking) with Honours', 'Bachelor of Computer Science (Graphics & Multimedia Technology) with Honours','Bachelor of Computer Science (Cyber Security) with Honours','Bachelor of Electrical Engineering (Electronics) with Honours','Bachelor of Electrical Engineering Technology (Power & Machine) with Honours','Bachelor of Electrical Engineering with Honours','Diploma in Electrical and Electronics Engineering',''])->nullable();
            $table->enum('faculty', ['Faculty of Electrical and Electronics Engineering Technology','Faculty of Mechanical and Automotive Engineering Technology','Faculty of Manufacturing and Mechatronic Engineering Technology','Faculty of Computing'])->nullable();
            $table->enum('year', ['1', '2', '3','4','5'])->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['Student', 'Admin'])->default('Student'); 
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
