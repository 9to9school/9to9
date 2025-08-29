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
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_id');
            $table->unsignedBigInteger('user_id');
        $table->string('academic_year')->nullable();
        $table->string('admission_number')->nullable();
        $table->string('admission_date')->nullable();
        

        $table->string('father_name')->nullable();
        $table->string('mother_name')->nullable();
        $table->string('phone_number_1');
        $table->string('phone_number_2')->nullable();
        $table->string('address')->nullable();
        $table->string('city')->nullable();
        $table->string('zip')->nullable();
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parents');
    }
};
