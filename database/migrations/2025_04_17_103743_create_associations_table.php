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
        Schema::create('associations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nom');
            $table->string('adresse')->nullable();
            $table->string('ville')->nullable();
            $table->integer('code_postal')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->text('description')->nullable();
            $table->string('site_web')->nullable();
            $table->longText('logo')->nullable(); // Pour stocker les données de l'image encodée en base64
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('associations');
    }
};
