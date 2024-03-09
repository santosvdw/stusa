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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('naam');
            $table->string('afkorting');
            $table->string('plaats');
            $table->string('postcode');
            $table->string('straat');
            $table->string('huisnummer');
            $table->string('telefoonnummer');
            $table->string('email');
            $table->string('website');
            $table->string('niveaus');
            $table->string('jaarlagen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
