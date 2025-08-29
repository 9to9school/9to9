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
        Schema::create('common_settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo_header')->nullable();
            $table->string('logo_footer')->nullable();
            $table->string('mobile_logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('site_title');
            $table->text('site_desc')->nullable();
            $table->text('copyright_content')->nullable();
            $table->text('address')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('email_id')->nullable();
            $table->string('facebook')->nullable();
            $table->string('insta')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->text('privacy_policy')->nullable();
            $table->text('terms_and_conditions')->nullable();
            $table->text('refund_policy')->nullable();
            $table->text('shipping_policy')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('common_settings');
    }
};