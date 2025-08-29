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
        Schema::create('child_syllabi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_id')->nullable(); 
            $table->unsignedBigInteger('student_id')->nullable(); 
            $table->string('age')->nullable();
            $table->string('topic')->nullable();
            $table->string('sub_topic')->nullable();
            $table->enum('source', ['default', 'apk'])->default('default');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('child_syllabi');
    }
};
