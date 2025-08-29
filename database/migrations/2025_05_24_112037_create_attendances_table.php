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
        Schema::create('attendances', function (Blueprint $table) {
             $table->id();
    
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('school_id')->nullable();
            $table->unsignedBigInteger('teacher_id')->nullable();
            
            $table->date('date')->nullable();
            
            $table->enum('status', ['present', 'absent', 'leave', 'halfday', 'holiday', 'late'])->nullable()->default('absent');
            $table->text('note')->nullable()->comment('Optional note or remark for attendance');
            
            $table->timestamps();

    // Optional: add foreign key constraints if needed
    // $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
    // $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('set null');
    // $table->foreign('school_id')->references('id')->on('schools')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
