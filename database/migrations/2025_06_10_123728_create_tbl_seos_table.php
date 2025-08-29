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
        Schema::create('tbl_seos', function (Blueprint $table) {
            $table->id();
              $table->string('url')->unique();                  // Unique URL
            $table->string('title');                          // Title
            $table->text('description')->nullable();          // Meta Description
            $table->text('keyword')->nullable();              // Meta Keywords
            $table->string('image')->nullable();              // SEO Image (path)
            $table->boolean('status')->default(1); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_seos');
    }
};
