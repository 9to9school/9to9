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
        Schema::create('kit_order_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kit_order_id');
        $table->string('transaction_id');
        $table->string('payment_method')->nullable();  // e.g., UPI, Card
        $table->string('payment_status')->default('success');
        $table->timestamp('paid_at')->nullable();
        $table->timestamps();

        $table->foreign('kit_order_id')->references('id')->on('kit_orders')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kit_order_payments');
    }
};
