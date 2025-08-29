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
        Schema::create('pre_banners', function (Blueprint $table) {
            $table->id();
            $table->string('page')->nullable();
            $table->string('topbar')->nullable();
            $table->string('heading');
            $table->string('sub_heading');
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->string('button_name1')->nullable();
            $table->string('button_link1')->nullable();
            $table->string('button_name2')->nullable();
            $table->string('button_link2')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pre_banners');
    }
};
