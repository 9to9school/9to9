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
        Schema::create('partner_school_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('partner_school_id');
            $table->unsignedBigInteger('user_id');
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('rating')->unsigned()->comment('1 to 5 stars');
            $table->text('review')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partner_school_reviews');
    }
};
