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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->string('media')->nullable(); 
            $table->enum('media_type', ['image', 'video'])->default('image'); 
            $table->text('description')->nullable();
            $table->text('short_summary')->nullable(); 
            $table->string('button_name')->nullable();
            $table->string('button_link')->nullable();
            $table->boolean('status')->default(true); 
            $table->string('from_time')->nullable(); 
            $table->string('to_time')->nullable();   
            $table->date('date')->nullable();       
            $table->string('duration')->nullable(); 
            $table->string('location')->nullable();  

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};