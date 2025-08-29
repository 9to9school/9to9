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
        Schema::create('daycare_programs', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('heading');
            $table->text('description')->nullable();
            $table->string('sub_heading');
            $table->string('Key1')->nullable();
            $table->string('Key2')->nullable();
            $table->string('Key3')->nullable();
            $table->string('Key4')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daycare_programs');
    }
};
