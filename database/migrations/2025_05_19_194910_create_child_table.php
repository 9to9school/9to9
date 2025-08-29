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
        Schema::create('child', function (Blueprint $table) {
            $table->id();
            $table->id();
            $table->unsignedBigInteger('student_id'); // Foreign key to students table
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->integer('age')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('child');
    }
};
