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
        Schema::create('web_contents', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();                // Main image
            $table->string('background_image')->nullable();     // Background image

            $table->string('subheading')->nullable();
            $table->string('heading')->nullable();
            $table->text('description')->nullable();

            $table->string('button_name')->nullable();
            $table->string('button_link')->nullable();

            $table->string('button_name2')->nullable();
            $table->string('button_link2')->nullable();

            $table->boolean('status')->default(1);              // 1 = Active, 0 = Inactive

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_contents');
    }
};
