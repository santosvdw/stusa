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
        Schema::create('practice_exams', function (Blueprint $table) {
            $table->id();
            $table->string('vak_id');
            $table->string('onderwerp');
            $table->string('titel');
            $table->string('gebruiker_id');
            $table->string('jaarlaag');
            $table->string('school_id');
            $table->string('niveau');
            $table->boolean('examenstof');
            $table->longText('beschrijving');
            $table->string('opgaven');
            $table->string('bijlage');
            $table->string('antwoorden')->nullable();
            $table->string('normering')->nullable();
            $table->string('lesstof')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practice_exams');
    }
};
