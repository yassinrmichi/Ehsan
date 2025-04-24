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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // donateur
            $table->foreignId('association_id')->constrained()->onDelete('cascade');
            $table->decimal('montant', 10, 2);
            $table->enum('status', ['en_attente', 'valide', 'refuse'])->default('en_attente');
            $table->string('methode_paiement'); // ex : stripe, paypal, virement
            $table->timestamp('date_don')->useCurrent();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
