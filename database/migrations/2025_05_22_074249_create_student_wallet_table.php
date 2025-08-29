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
        Schema::create('student_wallet', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable(); 
            $table->decimal('student_coins', 10, 2)->nullable();  
            $table->date('payment_date')->nullable();             
            $table->enum('ladger_status', ['credit', 'debit'])->nullable(); 
            $table->enum('status', ['active', 'inactive'])->nullable();   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_wallet');
    }
};
