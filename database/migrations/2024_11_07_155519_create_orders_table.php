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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity'); // Quantity of items in the order
            $table->bigInteger('total amount'); // Total amount for COP (hay que arreglar esta migracion) 
            $table->string('status', 255); // Order status
            $table->timestamp('date_time'); // Date and time of the order
            $table->text('content'); // Content or details of the order
            $table->string('address', 255); // Delivery address
            $table->date('estimated_delivery_date'); // Estimated delivery date
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            /*$table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');*/
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
