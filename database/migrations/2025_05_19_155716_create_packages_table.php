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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url')->nullable();
            $table->string('image')->nullable();
            $table->string('banner_image')->nullable();
            $table->text('description')->nullable();
            $table->decimal('per_month_fee', 10, 2)->nullable();  
            $table->decimal('annual_fee', 10, 2)->nullable();      
            $table->decimal('discount_fee', 10, 2)->nullable();    
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
