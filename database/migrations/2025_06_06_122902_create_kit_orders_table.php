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
        Schema::create('kit_orders', function (Blueprint $table) {
            $table->id();
         $table->string('order_id')->unique();          // e.g., ORD123456
        $table->unsignedBigInteger('kit_id');
        $table->unsignedBigInteger('user_id');
        $table->string('name');
        $table->string('address');
        $table->string('city');
        $table->string('state');
        $table->string('pincode');
        $table->string('phone');
        $table->decimal('item_price', 10, 2);
        $table->decimal('delivery_charge', 10, 2)->default(0);
        $table->decimal('total', 10, 2);
        $table->string('status')->default('pending');  // pending, paid, failed
        $table->timestamps();

        $table->foreign('kit_id')->references('id')->on('kits')->onDelete('cascade');
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kit_orders');
    }
};
