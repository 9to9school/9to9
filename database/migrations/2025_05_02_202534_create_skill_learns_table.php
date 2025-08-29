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
        Schema::create('skill_learns', function (Blueprint $table) {
            $table->id();
            
            $table->string('heading');
            $table->string('image')->nullable();
            $table->string('button');
            $table->string('url')->nullable();
            $table->string('playbtn')->nullable();
            $table->string('playurl')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skill_learns');
    }
};
