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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255); // Product name
            $table->string('model', 255); // Product model
            $table->bigInteger('price'); //biginteger for COP 
            $table->text('description'); // Description of the product
            $table->string('generation', 255); // Generation info
            $table->date('release_date'); // Release date of the product
            $table->string('availability', 255); // Availability status
            $table->text('technical_specifications'); // Technical specifications of the product
            $table->string('brand', 255); // Brand of the product
            //$table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Foreign key to categories table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_products');
    }
};
