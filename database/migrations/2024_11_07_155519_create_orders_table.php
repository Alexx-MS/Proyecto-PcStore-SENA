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
            $table->integer('quantity'); // Total cantidad de productos en la orden
            $table->decimal('total_amount', 10,2); // Total monto de la orden
            $table->string('status'); // Estado de la orden
            $table->timestamp('date_time'); // Fecha y hora de la orden
            $table->text('content'); // Detalles de la orden
            $table->string('address'); // Dirección de entrega
            $table->date('estimated_delivery_date'); // Fecha estimada de entrega
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('payment_id')->nullable()->constrained('payments')->onDelete('set null'); 
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
