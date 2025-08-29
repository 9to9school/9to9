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
        Schema::create('pre_whychooses', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->string('description');
            $table->string('image')->nullable();
            $table->text('title')->nullable();
            $table->string('paragraph')->nullable();
            $table->text('title2')->nullable();
            $table->string('paragraph2')->nullable();
            $table->text('title3')->nullable();
            $table->string('paragraph3')->nullable();
            $table->text('title4')->nullable();
            $table->string('paragraph4')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pre_whychooses');
    }
};
