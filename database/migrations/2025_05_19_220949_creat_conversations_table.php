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
        Schema::create('conversations', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('donator_id');
        $table->unsignedBigInteger('association_id');
        $table->timestamps();

        $table->unique(['donator_id', 'association_id']); // Une seule conversation entre eux
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::dropIfExists('conversations');
    }
};
