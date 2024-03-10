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
            $table->string('username')->unique();
            $table->boolean('student')->default(true); // true = student, false = docent
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('voornaam');
            $table->string('achternaam');
            $table->foreignId('school_id');
            $table->string('jaarlaag')->nullable();
            $table->string('niveau')->nullable();
            $table->string('klas')->nullable();
            $table->string('profiel')->nullable();
            $table->string('profielfoto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
