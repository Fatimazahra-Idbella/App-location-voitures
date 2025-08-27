<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();

            // Liens avec utilisateur et voiture
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('vehicle_id');

            // Détails du contrat
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('price', 10, 2);
            $table->enum('status', ['pending', 'active', 'closed'])->default('pending');

            $table->timestamps();

            // Clés étrangères
            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('vehicle_id')->references('id')->on('voitures')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
