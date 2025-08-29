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
        Schema::create('preferred_times', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('parent_id');
            $table->unsignedBigInteger('school_id');
            $table->string('preferred_time');
            $table->date('date_from')->nullable();
            $table->date('date_to')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();

            // Foreign keys
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preferred_times');
    }
};
