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
        Schema::create('student_fees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('school_id')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('order_id')->nullable();
            $table->decimal('per_month_fees', 10, 2)->nullable();
            $table->string('month')->nullable();
            $table->decimal('discount_amount', 10, 2)->nullable();
            $table->decimal('paid_amount', 10, 2)->nullable();
            $table->enum('payment_status', ['pending', 'paid', 'failed','partial'])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_fees');
    }
};
