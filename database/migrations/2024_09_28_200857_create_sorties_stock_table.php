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
        Schema::create('sorties_stock', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_id')->constrained()->onDelete('cascade');
            $table->integer('quantité_sortie');
            $table->string('ville_destination')->nullable();
            $table->foreignId('direction_id')->nullable()->constrained()->onDelete('cascade');
            $table->dateTime('date_sortie');
            $table->integer('quantité_restante');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sorties_stock');
    }
};
