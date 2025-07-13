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
        Schema::create('voitures', function (Blueprint $table) {
            $table->id();
            $table->string('marque');
            $table->string('model');
            $table->string('matriculG');
            $table->string('matriculL');
            $table->string('matriculS');
            $table->string('compteur');
            $table->date('d_compteur');
            // $table->foreignId('userID')
            //         ->constrained('users')
            //         ->onDelete('cascade')
            //         ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voitures');
    }
};
