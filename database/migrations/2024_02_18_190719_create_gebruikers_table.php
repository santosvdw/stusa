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
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('wachtwoord');
            $table->string('voornaam');
            $table->string('achternaam');
            $table->string('school_id');
            $table->string('jaarlaag');
            $table->string('niveau');
            $table->string('klas')->nullable();
            $table->string('profiel')->nullable();
            $table->string('profielfoto')->nullable();
            $table->boolean('docent');
            $table->rememberToken();
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
