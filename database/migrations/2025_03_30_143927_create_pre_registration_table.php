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
        Schema::create('pre_registration', function (Blueprint $table) {
            $table->id();
            $table->string('parent_name');
            $table->string('child_name');
            $table->string('age');
            $table->string('pin_code');
            $table->string('address');
            $table->string('email');
            $table->string('is_active');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pre_registration');
    }
};