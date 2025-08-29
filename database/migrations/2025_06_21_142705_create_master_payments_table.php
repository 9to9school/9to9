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
        Schema::create('master_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('school_id')->nullable();
            $table->string('order_id')->nullable();
            $table->decimal('total', 10, 2)->nullable();
            $table->string('source')->nullable();
            $table->string('purpose')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_payments');
    }
};
