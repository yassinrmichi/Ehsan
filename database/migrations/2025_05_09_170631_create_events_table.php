<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('events', function (Blueprint $table) {
        $table->id();
        $table->foreignId('association_id')->constrained()->onDelete('cascade');
        $table->string('titre');
        $table->text('description')->nullable();
        $table->date('date');
        $table->string('lieu');
        $table->string('image')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
