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
        Schema::create('on_boarding_slider', function (Blueprint $table) {
            $table->id();
            $table->string('screen_1_image');
            $table->string('screen_1_heading');
            $table->text('screen_1_short_intro');
            $table->string('screen_1_button_text');
            $table->string('screen_2_image');
            $table->string('screen_2_heading');
            $table->text('screen_2_short_intro');
            $table->string('screen_2_button_text');
            $table->string('screen_3_image');
            $table->string('screen_3_heading');
            $table->text('screen_3_short_intro');
            $table->string('screen_3_button_text');
            $table->string('screen_4_image');
            $table->string('screen_4_heading');
            $table->text('screen_4_short_intro');
            $table->string('screen_4_button_text');
            $table->string('screen_5_image');
            $table->string('screen_5_heading');
            $table->text('screen_5_short_intro');
            $table->string('screen_5_button_text');
            $table->enum('is_active', ['true', 'false'])->default('true');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_onboarding');
    }
};