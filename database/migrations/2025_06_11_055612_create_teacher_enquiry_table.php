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
        Schema::create('teacher_enquiry', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->integer('age')->nullable();

            $table->string('highest_qualification');
            $table->string('teaching_experience')->nullable();
            $table->string('previous_institution')->nullable();

            $table->json('subjects')->nullable(); 
            $table->string('preferred_location');

            $table->string('current_salary')->nullable();
            $table->string('expected_salary')->nullable();
            $table->string('available_from')->nullable();

            $table->text('why_join')->nullable();
            $table->text('resume_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_enquiry');
    }
};
