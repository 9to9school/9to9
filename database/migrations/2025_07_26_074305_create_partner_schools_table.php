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
        Schema::create('partner_schools', function (Blueprint $table) {
            $table->id();
            $table->string('school_name');
            $table->string('school_logo')->nullable();
            $table->string('school_email');
            $table->string('school_phone_1');
            $table->string('school_phone_2')->nullable();
            $table->string('principal_name');
            $table->string('vice_principal_name')->nullable();
            $table->text('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('document')->nullable();
            $table->string('image')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('age')->nullable();
            $table->decimal('fees', 10, 2)->nullable();
            $table->text('about_us')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partner_schools');
    }
};
