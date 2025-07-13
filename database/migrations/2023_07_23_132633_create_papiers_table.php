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
        Schema::create('papiers', function (Blueprint $table) {
            $table->id();
            $table->date('assurance')->nullable()->default(null);
            $table->date('visite')->nullable()->default(null);
            $table->date('circulation')->nullable()->default(null);
            $table->unsignedBigInteger('papier_id');
            $table->foreign('papier_id')
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
        Schema::dropIfExists('papiers');
    }
};
