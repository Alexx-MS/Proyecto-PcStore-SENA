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
            $table->unsignedBigInteger('product_id');  // Clave foránea
            $table->integer('rating');  // Calificación
            $table->text('comment');  // Comentario
            $table->date('date');  // Fecha
            $table->integer('usefulness');  // Utilidad
            //aqui hace falta la llave foranea de product
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
