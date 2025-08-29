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
        Schema::create('apply_franchise', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('city_state')->nullable();
            $table->string('preferred_location')->nullable();
            $table->decimal('investment_capacity', 10, 2)->nullable(); // for INR
            $table->text('business_background')->nullable();
            $table->text('comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apply_franchise');
    }
};
