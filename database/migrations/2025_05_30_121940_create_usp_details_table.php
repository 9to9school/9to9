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
        Schema::create('usp_details', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();                // Main image
            $table->string('heading')->nullable();
            $table->text('description')->nullable();
            $table->boolean('status')->default(1);   
            $table->enum('payment_status', ['active', 'inactive'])->default('active');
   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usp_details');
    }
};
