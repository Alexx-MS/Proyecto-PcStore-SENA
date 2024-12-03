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
        Schema::create('opinions', function (Blueprint $table) {
            $table->id();
            $table->integer('rating');  // Calificación de 1 a 5 (estrellas)
            $table->text('comment');  // Comentario
            $table->date('date');  // Fecha en la que se deja la opinión
            $table->boolean('usefulness')->default(false);  // Utilidad (true = útil, false = no útil)
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');  // Relación con el producto
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opinions');
    }
};
