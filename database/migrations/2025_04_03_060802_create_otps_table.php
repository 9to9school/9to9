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
        Schema::create('otps', function (Blueprint $table) {
            $table->id();
           
            $table->string('phone_number', 15);
            $table->string('otp', 6);
            $table->boolean('status')->default(0); // 0 = Unused, 1 = Used
           
            
            // Foreign key constraint (Optional)
            $table->timestamps();
            $table->foreign('phone_number')
                  ->references('phone_number')
                  ->on('pre_registeration_callbacks')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('otps');
    }
};