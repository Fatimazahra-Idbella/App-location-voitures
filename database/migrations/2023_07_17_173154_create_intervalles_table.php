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
        Schema::create('intervalles', function (Blueprint $table) {
            $table->id();
            $table->integer('intervalle_videnge');
            $table->integer('intervalle_plaquette');
            $table->integer('intervalle_croix');
            $table->integer('intervalle_assurance');
            $table->integer('intervalle_visit');
            $table->integer('intervalle_circulation');
            $table->unsignedBigInteger('intervalle_id');
            $table->foreign('intervalle_id')
                    ->references('id')
                    ->on('voitures')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intervalles');
    }
};
