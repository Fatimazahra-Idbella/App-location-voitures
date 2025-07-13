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
        Schema::create('repairs', function (Blueprint $table) {
            $table->id();
            $table->integer('videnge');
            $table->date('d_videnge')->nullable();
            $table->integer('plaquette')->nullable();
            $table->integer('croix_chaine')->nullable();
            $table->boolean('isfilteroil')->nullable();
            $table->boolean('isfilterair')->nullable();
            $table->boolean('isfiltergasoil')->nullable();
            $table->string('autre_repair')->nullable();
            $table->unsignedBigInteger('car_id');
            $table->foreign('car_id')
                    ->references('id')
                    ->on('voitures')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            // $table->foreignId('car_id')
            //         ->constrained('voitures')
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
        Schema::dropIfExists('repairs');
    }
};
