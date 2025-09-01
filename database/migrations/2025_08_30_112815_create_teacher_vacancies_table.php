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
        Schema::create('teacher_vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();          // Morning & Afternoon
            $table->integer('school_id')->nullable();       // 45 students
            $table->text('syllabus')->nullable();      // 45 students
            $table->integer('students')->nullable();       // 45 students
            $table->string('shift')->nullable();          // Morning & Afternoon
            $table->decimal('fee', 10, 2)->nullable();    // 2800.00
            $table->integer('openings')->nullable();      // 3 openings
            $table->string('phone')->nullable();    // For call button
            $table->string('whatsapp')->nullable(); // For WhatsApp button
            $table->enum('status', ['open','closed'])->default('open');
            $table->string('experience')->nullable();
            $table->text('job_description')->nullable();     
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_vacancies');
    }
};
