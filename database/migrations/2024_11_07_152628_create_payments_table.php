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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date_time');
            $table->bigInteger('total_amount');
            $table->string('payment_method');
            $table->string('authorization_number');
            $table->string('billing_address');
            $table->string('transaction_number');
            //alex cuando lo veas dime si le pongo un tamaño a cada dato o no 
            $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
