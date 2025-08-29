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
        Schema::create('our_programs', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->text('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->string('image')->nullable();
            $table->time('time_from')->nullable();
            $table->time('time_to')->nullable();
            $table->decimal('fees', 10, 2)->nullable();
            $table->string('week')->nullable();
            $table->integer('student')->nullable();
            $table->string('age_group')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_programs');
    }
};
