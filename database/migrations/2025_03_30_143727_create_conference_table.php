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
        Schema::create('conference', function (Blueprint $table) {
            $table->id();
            $table->string('conference_name');
            $table->string('classroom_name');
            $table->dateTime('start_timing');
            $table->dateTime('end_timing');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->enum('is_active', ['active', 'false'])->default('active');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conference');
    }
};